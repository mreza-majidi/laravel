<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        $user = \Auth::user()->token();
        $user->revoke();
        return $this->success(__('messages.logout.success'));
    }
}
