<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Request;
use App\Models\Document;
use App\Models\Wallet;
use App\Services\WalletService;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.partials.quick-user', 'layouts.partials.header'], function ($view) {
            $user            = auth()->user();
            $wallets         = \walletService()->getWallets(['user_id' => $user->id]);
            $privateMessages = privateMessageService()->index(['user' => $user]);
            $unSeen          = privateMessageService()->count(['user' => $user]);
            $document        = Document::query()->where('user_id', $user->id)->first();
            $view->with('user', $user)->with('wallets', $wallets)->with('privateMessages', $privateMessages)->with('count', $unSeen)->with('document', $document);
        });
        view()->composer(['user.user-profile.profile'], function ($view) {
            $user = auth()->user();
            $view->with('user', $user);
        });
    }
}
