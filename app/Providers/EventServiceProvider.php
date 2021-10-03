<?php

namespace App\Providers;

use App\Events\AfterUploadEvent;
use App\Events\ForgotPassword;
use App\Events\NewUserVerification;
use App\Http\Requests\AuthForgotPasswordRequest;
use App\Listeners\AfterUploadListener;
use App\Listeners\CreateProfileListener;
use App\Listeners\SendEmailVerificationListener;
use App\Listeners\SendForgotPasswordLinkListener;
use App\Models\Media;
use App\Observers\MediaObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class          => [
            SendEmailVerificationNotification::class,
            CreateProfileListener::class,
        ],
        NewUserVerification::class => [SendEmailVerificationListener::class],
        ForgotPassword::class      => [SendForgotPasswordLinkListener::class],
        AfterUploadEvent::class    => [
            AfterUploadListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Media::observe(MediaObserver::class);
    }
}
