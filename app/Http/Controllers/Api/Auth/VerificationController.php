<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Http\Resources\VerifyResource;
use App\Models\OneTimeCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    public function check(VerificationRequest $request)
    {
        $otc = OneTimeCode::query()
                          ->where('value', $request->getCode())
                          ->where('expires_at', '>=', Carbon::now());

        if ($otc->exists()) {
            $timeNow  = Carbon::now();
            $response = $otc->first();
            $response->setUsedAt($timeNow)->save();
            $user = User::query()->where('id', $response->user_id)->first();
            $user->setEmailVerifiedAt($timeNow);
            $user->save();

            return $this->success(__('messages.verify.code.success'));
        }

        return $this->error(__('messages.verify.code.code_expire'), 406);
    }

    public function resendVerification()
    {

    }
}
