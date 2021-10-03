<?php

namespace App\Listeners;

use App\Constants\OneTimePasswordConstants;
use App\Events\ForgotPassword;
use App\Models\OneTimeCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordLinkListener
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
     * @param ForgotPassword $event
     *
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        $user = $event->user;

        $uuidHash = bcrypt(($user->getUuid()));

        $link = route('website.web.auth.send_forgot_password_link').'/'.urlencode($uuidHash);

        $expireTime = Carbon::now()->addHours(6);

        $oneTimeCode = new OneTimeCode();

        $oneTimeCode->setEmail($user->email);
        $oneTimeCode->setValue($uuidHash);
        $oneTimeCode->setExpiresAt($expireTime);
        $oneTimeCode->setType(OneTimePasswordConstants::TYPE_FORGOT_PASSWORD);
        $oneTimeCode->setUserId($user->id);
        $oneTimeCode->save();

        Mail::send('forgotPassword.forgotPassword', compact('user', 'link'), function ($message) use ($user) {
            $message->subject('بازیابی رمز عبور');
            $message->to($user->email);
        });
    }
}
