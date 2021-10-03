<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrivateMessageResource;
use App\Http\Resources\PrivateMessageShowResource;
use Auth;

class PrivateMessageController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Auth::guard()->user();

        $parameter       = [
            'user_id' => $user->id,
        ];
        $privateMessages = privateMessageService()->index($parameter);

        if ($privateMessages->count() > 0) {
            return $this->success(PrivateMessageResource::collection($privateMessages));
        }

        return $this->success([]);
    }

    /**
     * @param string $uuid
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $uuid): \Illuminate\Http\JsonResponse
    {
        $privateMessage = privateMessageService()->show(['uuid' => $uuid]);

        if ($privateMessage) {
            $privateMessage->setSeen(true);
            $privateMessage->save();

            return $this->success(new PrivateMessageShowResource($privateMessage));
        }

        return $this->success([]);
    }
}
