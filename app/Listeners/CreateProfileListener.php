<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateProfileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @param Registered $event
     */
    public function handle(Registered $event)
    {
        $user    = $event->user;
        $profile = new Profile();
        $profile->setUserId($user->id);
        $profile->save();
    }
}
