<?php

namespace App\Http\Controllers;

use App\Constants\ErrorConstants;
use App\Constants\ExternalAccountConstants;
use App\Exceptions\LogicException;
use App\Models\ExternalAccount;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mehrmudi\Mt5PhpClient\Exceptions\ConnectionException;
use Mehrmudi\Mt5PhpClient\Exceptions\TradeException;
use Mehrmudi\Mt5PhpClient\Exceptions\UserException;
use Mehrmudi\Mt5PhpClient\Lib\MTRetCode;

class ExternalAccountController extends Controller
{
    public function index()
    {
        $accounts = ExternalAccount::query()
                                   ->where('user_id', auth()->id())
                                   ->get()
        ;

        return view('user.create-account.index', compact('accounts'));
    }

    public function demoCreate()
    {
        $groups = ExternalAccountConstants::GROUPS_DEMO;
        $formAction = route('website.web.external_account.demo_store');
        $deposits = ExternalAccountConstants::DEPOSITS_DEMO;
        $leverages = ExternalAccountConstants::LEVERAGES_DEMO;

        return view('user.create-account.new-account', compact('groups', 'formAction', 'deposits', 'leverages'));
    }

    public function realCreate()
    {
        $groups = ExternalAccountConstants::GROUPS_REAL;
        $deposits = ExternalAccountConstants::DEPOSITS_REAL;
        $leverages = ExternalAccountConstants::LEVERAGES_REAL;
        $formAction = route('website.web.external_account.real_store');

        return view('user.create-account.new-account', compact('groups', 'formAction', 'deposits', 'leverages'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws UserException
     * @throws ConnectionException
     * @throws TradeException
     */
    public function demoStore(Request $request): RedirectResponse
    {
        return $this->storeAccount(ExternalAccountConstants::TYPE_META_TRADER_5_DEMO, $request);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws UserException
     * @throws ConnectionException
     * @throws TradeException
     */
    public function realStore(Request $request): RedirectResponse
    {
        return $this->storeAccount(ExternalAccountConstants::TYPE_META_TRADER_5_REAL, $request);
    }

    /**
     * @param string  $accountType
     * @param Request $request
     *
     * @return RedirectResponse
     *
     * @throws ConnectionException
     * @throws TradeException
     * @throws UserException
     */
    private function storeAccount(string $accountType, Request $request): RedirectResponse
    {
        if ($accountType == ExternalAccountConstants::TYPE_META_TRADER_5_REAL) {
            $groups = implode(',', ExternalAccountConstants::GROUPS_REAL);
        } else {
            $groups = implode(',', ExternalAccountConstants::GROUPS_DEMO);
        }

        $request->validate(array_merge($this->getBaseValidationRules($accountType), [
            'group' => 'required|in:'.$groups,
        ]));

        if (!$this->checkIfUserCanCreateAccount($accountType, auth()->id())) {
            alert()->error(__('Maximum accounts count limit reached.'));

            return redirect()->back();
        }

        $this->proceedUserCreation(array_merge($request->all(), ['username' => $this->getUsername($accountType)]));

        alert()->success('با موفقیت ساخته شد.');

        return redirect()->route('website.web.external_account.index');
    }

    /**
     * @param string $accountType
     *
     * @return string[]
     */
    private function getBaseValidationRules(string $accountType): array
    {
        if ($accountType == ExternalAccountConstants::TYPE_META_TRADER_5_REAL) {
            $leverages = implode(',', array_keys(ExternalAccountConstants::LEVERAGES_REAL));
            $depositRule = 'required|numeric';
        } else {
            $leverages = implode(',', array_keys(ExternalAccountConstants::LEVERAGES_DEMO));
            $deposits = implode(',', ExternalAccountConstants::DEPOSITS_DEMO);
            $depositRule = 'required|in:'.$deposits;
        }

        return [
            'zip_code' => 'required|numeric',
            'leverage' => 'required|in:'.$leverages,
            'deposit' => $depositRule,
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ];
    }

    /**
     * @param string $accountType
     *
     * @return string
     */
    private function getUsername(string $accountType): string
    {
        $lastUsername = ExternalAccount::query()
                                       ->orderBy('username', 'DESC')
                                       ->where('type', '=', $accountType)
                                       ->take(1)
                                       ->pluck('username')
                                       ->toArray()
        ;

        if (count($lastUsername) > 0) {
            $lastUsername = intval($lastUsername[0]) + 1;
        } else {
            if ($accountType == ExternalAccountConstants::TYPE_META_TRADER_5_REAL) {
                $lastUsername = ExternalAccountConstants::REAL_ACCOUNTS_START;
            } else {
                $lastUsername = ExternalAccountConstants::DEMO_ACCOUNTS_START;
            }
        }

        $this->checkIfUsernameIsInAllowedRange($lastUsername, $accountType);

        return strval($lastUsername);
    }

    /**
     * @param array $requestParameters
     *
     * @return array
     *
     * @throws UserException
     * @throws ConnectionException
     * @throws TradeException
     */
    private function proceedUserCreation(array $requestParameters): array
    {
        /** @var User $user */
        $user = auth()->user();

        $profile = $user->profile;

        $password = generateRandomString(9);
        $username = $requestParameters['username'];
        $parameters = [
            'name' => $user->getFullName(),
            'email' => $user->getEmail(),
            'group' => $requestParameters['group'],
            'leverage' => $requestParameters['leverage'],
            'phone' => $profile->getMobileNumber(),
            'address' => $profile->getAddress(),
            'city' => $requestParameters['city'],
            'state' => $requestParameters['state'],
            'country' => $requestParameters['country'],
            'zip_code' => $requestParameters['zip_code'],
            'main_password' => $password,
            'investor_password' => $password,
            'phone_password' => $password,
            'username' => $username,
        ];

        try {
            $mtUser = metaTraderService()->createUser($parameters);
        } catch (UserException $exception) {
            if ($exception->getCode() == MTRetCode::MT_RET_USR_LOGIN_EXIST) {
                $requestParameters['username'] = (intval($username) + 1);
                $this->proceedUserCreation($requestParameters);
            } else {
                throw $exception;
            }
        }

        $jsonData = ['user' => $mtUser];

        $externalAccount = new ExternalAccount();
        $externalAccount->setUsername($username);
        $externalAccount->setPassword($password);
        $externalAccount->setUserId($user->getId());
        $externalAccount->setType($this->getAccountType($requestParameters['group']));
        $externalAccount->setExtraData(json_encode($jsonData));
        $externalAccount->save();

        $trade = metaTraderService()->deposit($mtUser, $requestParameters['deposit']);

        $jsonData['ticket'] = $trade;

        $externalAccount->setExtraData(json_encode($jsonData));
        $externalAccount->save();

        return [
            'user' => $user,
            'trade' => $trade,
        ];
    }

    /**
     * @param string $group
     *
     * @return string
     */
    private function getAccountType(string $group): string
    {
        if (in_array($group, ExternalAccountConstants::GROUPS_DEMO)) {
            return ExternalAccountConstants::TYPE_META_TRADER_5_DEMO;
        }

        if (in_array($group, ExternalAccountConstants::GROUPS_REAL)) {
            return ExternalAccountConstants::TYPE_META_TRADER_5_REAL;
        }

        return '';
    }

    /**
     * @param int    $lastUsername
     * @param string $accountType
     */
    private function checkIfUsernameIsInAllowedRange(int $lastUsername, string $accountType): void
    {
        if ($lastUsername > ExternalAccountConstants::DEMO_ACCOUNTS_END && $accountType == ExternalAccountConstants::TYPE_META_TRADER_5_DEMO) {
            throw new LogicException(ErrorConstants::NO_MORE_USERNAME_AVAILABLE);
        }

        if ($lastUsername > ExternalAccountConstants::REAL_ACCOUNTS_END && $accountType == ExternalAccountConstants::TYPE_META_TRADER_5_REAL) {
            throw new LogicException(ErrorConstants::NO_MORE_USERNAME_AVAILABLE);
        }
    }

    /**
     * @param string $accountType
     * @param string $userId
     *
     * @return int
     */
    private function checkIfUserCanCreateAccount(string $accountType, string $userId): int
    {
        $accountsCount = ExternalAccount::query()
            ->where('type', '=', $accountType)
            ->where('user_id', '=', $userId)
            ->count('id');

        return $accountsCount < ExternalAccountConstants::MAX_ACCOUNTS_COUNT;
    }

}
