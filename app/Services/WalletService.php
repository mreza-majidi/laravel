<?php

namespace App\Services;

use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletType;

/**
 * Class WalletService
 *
 * @package App\Services
 */
class WalletService extends BaseService
{

    /**
     * @param array $parameters
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getWallets(array $parameters)
    {
        return $wallets = Wallet::query()
                         ->where('user_id', $parameters['user_id'])
                         ->join('wallet_types', 'wallet_types.id', '=', 'wallets.wallet_type_id')
                         ->select('wallets.balance', 'wallet_types.title', 'wallets.uuid')
                         ->get()
        ;
    }
    /**
     * @param User $user
     */
    public function createWalletsIfNotExists(User $user)
    {
        if (!$user->wallets()->exists()) {
            foreach (WalletType::all() as $walletType) {
                $user->wallets()->create(
                    [
                        'wallet_type_id' => $walletType->id,
                    ]
                );
            }
        }
    }
}
