<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @param      $personalAccessToken
     * @param null $message
     * @param int  $code
     *
     * @return JsonResponse
     */
    protected function token($personalAccessToken, $message = null, $code = 200)
    {
        $tokenData = [
            'access_token' => $personalAccessToken->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($personalAccessToken->token->expires_at)->toDateTimeString(),
        ];

        return $this->success($tokenData, $message, $code);
    }

    /**
     * @param      $data
     * @param null $message
     * @param int  $code
     *
     * @return JsonResponse
     */
    protected function success($data, $message = null, $code = 200)
    {
        $responeJson = [
            'success' => true,
            'data'    => $data,
        ];
        if ($message) {
            $responeJson['message'] = $message;
        }

        return new JsonResponse(
            $responeJson,
            $code
        );
    }

    /**
     * @param $data
     * @param $code
     *
     * @return JsonResponse
     */
    protected function error($data, $code)
    {
        return new JsonResponse(
            [
                'success' => false,
                'data'    => $data,
            ],
            $code
        );
    }
}
