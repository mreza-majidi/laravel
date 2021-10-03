<?php

namespace App\Services;

use App\Constants\RequestConstants;
use App\Models\Request;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\Jalalian;

/**
 * Class RequestService
 *
 * @package App\Services
 */
class RequestService extends BaseService
{

    /**
     * @param array $parameter
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function depositRequest(array $parameter)
    {
        return $showRequests = Request::query()
                                      ->where('user_id', $parameter['user_id'])
                                      ->where('type', RequestConstants::TYPE_DEPOSIT)
                                      ->orderBy('created_at', 'DESC')
                                      ->select('uuid', 'reference_id', 'amount', 'status', 'type', 'description', 'created_at', 'paid_at')
                                      ->limit(3)
                                      ->get()
            ;
    }


    /**
     * @param array $parameter
     *
     * @return array
     */
    public function chartDataDeposit(array $parameter): array
    {
        return $this->getChartData(RequestConstants::TYPE_DEPOSIT, $parameter['user_id']);
    }

    /**
     * @param array $parameter
     *
     * @return array
     */
    public function chartDataWithdraw(array $parameter): array
    {
        return $this->getChartData(RequestConstants::TYPE_WITHDRAW, $parameter['user_id']);
    }

    /**
     * @param array $parameter
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function withdrawRequest(array $parameter)
    {
        return $showRequests = Request::query()
                                      ->where('user_id', $parameter['user_id'])
                                      ->where('type', RequestConstants::TYPE_WITHDRAW)
                                      ->orderBy('created_at', 'DESC')
                                      ->select('uuid', 'reference_id', 'amount', 'status', 'type', 'description', 'created_at', 'paid_at')
                                      ->limit(3)
                                      ->get()
            ;
    }

    /**
     * @param array $parameter
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(array $parameter)
    {
        return $showRequests = Request::query()
                                      ->where('user_id', $parameter['user_id'])
                                      ->orderBy('created_at', 'DESC')
                                      ->select('uuid', 'reference_id', 'amount', 'status', 'type', 'description', 'created_at', 'paid_at')
            ->paginate(12)
            ;
    }

    /**
     * @param array $parameters
     */
    public function storeRequest(array $parameters)
    {
        $referenceId = Request::query()->pluck('reference_id');

        $generateRefId = null;
        while (true) {
            $generateRefId = rand(10000000, 99999999);
            if (!isset($referenceId[$generateRefId])) {
                break;
            }
        }

        $requestStore = new Request();
        $requestStore->setUserId($parameters['user_id']);
        $requestStore->setAmount($parameters['amount']);
        $requestStore->setType($parameters['type']);
        $requestStore->setWalletId(Wallet::findIdByUuid($parameters['wallet_id']));
        $requestStore->setDescription($parameters['description'] ?? '');
        $requestStore->setReferenceId($generateRefId);
        $requestStore->save();
    }

    /**
     * @param array   $parameters
     * @param Request $requestModel
     */
    public function updateRequest(array $parameters, Request $requestModel)
    {
        $requestModel->description = $parameters['description'];
        $requestModel->amount      = $parameters['amount'];
        $requestModel->type        = $parameters['type'];
        $requestModel->wallet_id   = Wallet::findIdByUuid($parameters['wallet_id']);
        $requestModel->save();
    }

    /**
     * @param string      $requestType
     * @param string|null $userId
     *
     * @return string
     */
    private function getBaseReportQuery(string $requestType, string $userId = null): string
    {
        $baseQuery = 'SELECT COUNT(id) AS requestsCount, MIN(DATE(requests.created_at)) AS date FROM requests WHERE requests.type = "%s" AND requests.status = "accepted"';
        if ($userId) {
            $baseQuery .= sprintf(' AND requests.user_id = %s', $userId);
        }
        $baseQuery .= ' GROUP BY MONTH(requests.created_at) ORDER BY requests.created_at ASC ';

        return sprintf($baseQuery, $requestType);
    }

    /**
     * @param string $requestType
     * @param string $userId
     *
     * @return array
     */
    private function getChartData(string $requestType, string $userId): array
    {
        $user = auth()->user();
        if ($user->isSuperAdmin()) {
            $chartDataGroup = DB::select($this->getBaseReportQuery($requestType));
        } else {
            $chartDataGroup = DB::select($this->getBaseReportQuery($requestType, $userId));
        }
        $output = [];
        foreach ($chartDataGroup as $data) {
            $date               = $data->date;
            $requestsCount      = $data->requestsCount;
            $dateObj            = Carbon::createFromFormat('Y-m-d', $date)->setTime(0, 0, 0);
            $monthName          = Jalalian::fromCarbon($dateObj)->format('%B');
            $output[$monthName] = $requestsCount;
        }

        return $output;
    }
}
