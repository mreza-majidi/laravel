<?php

namespace App\Services;

use App\Http\Resources\PrivateMessageResource;
use App\Http\Resources\PrivateMessageShowResource;
use App\Models\PrivateMessage;

/**
 * Class PrivateMessageService
 *
 * @package App\Services
 */
class PrivateMessageService extends BaseService
{
    /**
     * @param array $parameter
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(array $parameter)
    {
        return $privateMessages = $parameter['user']->privateMessages()->orderBy('created_at', 'DESC')->get();
    }


    /**
     * @param array $parameter
     *
     * @return mixed
     */
    public function count(array $parameter)
    {
        $privateMessages = $parameter['user']->privateMessages();

        return $privateMessages->where('seen', '=', 0)->count();
    }

    /**
     * @param array $parameter
     *
     * @return PrivateMessage
     */
    public function show(array $parameter): PrivateMessage
    {
        $privateMessage = PrivateMessage::findByUuid($parameter['uuid']);
        if ($privateMessage) {
            if (!$privateMessage->isSeen()) {
                $privateMessage->setSeen(true);
                $privateMessage->save();
            }
        }

        return $privateMessage;
    }
}
