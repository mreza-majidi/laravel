<?php

namespace App\Services;

use Mehrmudi\Mt5PhpClient\DTOs\Trade;
use Mehrmudi\Mt5PhpClient\DTOs\User;
use Mehrmudi\Mt5PhpClient\Exceptions\ConnectionException;
use Mehrmudi\Mt5PhpClient\Exceptions\UserException;
use Mehrmudi\Mt5PhpClient\Mt5PhpClient;

/**
 * Class MetaTraderService
 * @package App\Services
 */
class MetaTraderService extends BaseService
{
    /**
     * @var Mt5PhpClient
     */
    private $client;

    /**
     * MetaTraderService constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = resolve('MT5Client');
    }

    /**
     * @param array $parameters
     *
     * @return User
     *
     * @throws ConnectionException
     * @throws UserException
     */
    public function createUser(array $parameters): User
    {
        $user = new User();
        $user->setName($parameters['name']);
        $user->setEmail($parameters['email']);
        $user->setGroup($parameters['group']);
        $user->setLeverage($parameters['leverage']);
        $user->setPhone($parameters['phone']);
        $user->setAddress($parameters['address']);
        $user->setCity($parameters['city']);
        $user->setState($parameters['state']);
        $user->setCountry($parameters['country']);
        $user->setZipCode($parameters['zip_code']);
        $user->setMainPassword($parameters['main_password']);
        $user->setInvestorPassword($parameters['investor_password']);
        $user->setPhonePassword($parameters['phone_password']);
        $user->setLogin($parameters['username']);

        return $this->client->createUser($user);
    }

    /**
     * @param User $user
     * @param int  $amount
     *
     * @return Trade
     *
     * @throws ConnectionException
     * @throws \Mehrmudi\Mt5PhpClient\Exceptions\TradeException
     */
    public function deposit(User $user, int $amount): Trade
    {
        $trade = new Trade();
        $trade->setLogin($user->getLogin());
        $trade->setAmount($amount);
        $trade->setComment("Deposit");
        $trade->setType(Trade::DEAL_BALANCE);

        return $this->client->trade($trade);
    }
}
