<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WalletController extends Controller
{

    /**
     * @param User $user
     *
     * @return Collection
     */
    public function getWallets(User $user): Collection
    {
        return walletService()->getWallets(['user_id' => $user->id]);
    }
}
