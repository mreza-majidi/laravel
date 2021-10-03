<?php

namespace App\Providers;

use App\Factories\DirectoryNamerFactory;
use App\Interfaces\DirectoryNamerInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->forceRoutingToGenerateHttps();

        $this->bindServices();
    }

    /**
     *
     */
    private function forceRoutingToGenerateHttps(): void
    {
        if ($this->app->environment(['production', 'staging'])) {
            URL::forceScheme('https');
        }
    }

    /**
     *
     */
    private function bindServices()
    {
        $this->app->bind('MetaTraderService', \App\Services\MetaTraderService::class);
        $this->app->bind('AnnouncementService', \App\Services\AnnouncementService::class);
        $this->app->bind('UploadService', \App\Services\UploadService::class);
        $this->app->bind('FileService', \App\Services\FileManagement\FileService::class);
        $this->app->bind('UserService', \App\Services\UserService::class);
        $this->app->bind('DocumentService', \App\Services\DocumentService::class);
        $this->app->bind('PrivateMessageService', \App\Services\PrivateMessageService::class);
        $this->app->bind('WalletService', \App\Services\WalletService::class);
        $this->app->bind('ProfileService', \App\Services\ProfileService::class);
        $this->app->bind('RequestService', \App\Services\RequestService::class);
        $this->app->singleton(DirectoryNamerInterface::class, DirectoryNamerFactory::class);
    }
}
