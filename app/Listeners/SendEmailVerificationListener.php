<?php

namespace App\Listeners;

use App\Constants\OneTimePasswordConstants;
use App\Events\NewUserVerification;
use App\Models\OneTimeCode;
use Carbon\Carbon;
use Mail;

class SendEmailVerificationListener
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
     * Handle the event.
     *
     * @param NewUserVerification $event
     *
     * @return void
     */
    public function handle(NewUserVerification $event)
    {
        $user = $event->user;


        $randomNumber = rand(10000, 99999);
        $expireTime   = Carbon::now()->addHours(6);


        $oneTimeCode = new OneTimeCode();

        $oneTimeCode->setEmail($user->email);
        $oneTimeCode->setValue($randomNumber);
        $oneTimeCode->setExpiresAt($expireTime);
        $oneTimeCode->setSendCount(1);
        $oneTimeCode->setType(OneTimePasswordConstants::TYPE_EMAIL_VERIFICATION);
        $oneTimeCode->setUserId($user->id);
        $oneTimeCode->save();

        Mail::send('emailVerification.verification', compact('user', 'randomNumber'), function ($message) use ($user) {
            $message->subject('تایید ایمیل');
            $message->to($user->email);
        });
    }
}
