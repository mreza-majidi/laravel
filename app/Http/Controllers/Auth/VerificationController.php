<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Models\OneTimeCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();
        if ($user->isEmailVerified()) {
            return abort(404);
        }

        return view('auth.email-verify');
    }

    /**
     * @param VerificationRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
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

            return redirect()->route('dashboard');
        }

        $error = __('messages.verify.code.code_expire');

        return view('auth.email-verify', compact('error'));
    }
}
