<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrivateMessageResource;
use App\Http\Resources\PrivateMessageShowResource;
use App\Models\User;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    /**
     * @param string $uuid
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $uuid)
    {
        $privateMessage = privateMessageService()->show(['uuid' => $uuid]);
        $user           = auth()->user();

        return view('layouts.partials.message', compact('privateMessage'));
    }
}
