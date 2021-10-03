<?php

namespace App\Http\Controllers\Auth;

use App\Events\NewUserVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Route;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param RegisterRequest $request
     *
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        session()->flash('previous-route', 'website.web.auth.register');

        $user = new User();
        $user->setEmail($request->getEmail());
        $user->setPassword(bcrypt($request->getPassword()));
        $user->save();
        $user->profile()->create();
        walletService()->createWalletsIfNotExists($user);
        Auth::login($user);

        event(new NewUserVerification($user));
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
