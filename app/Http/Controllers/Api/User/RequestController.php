<?php

namespace App\Http\Controllers\Api\User;

use App\Constants\RequestConstants;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestStoreRequest;
use App\Models\Request;
use Auth;

class RequestController extends Controller
{


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $user = Auth::guard('api')->user();

        $showRequests = requestService()->index(['user_id' => $user->id]);

        return $this->success($showRequests);
    }


    /**
     * @param RequestStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeRequest(RequestStoreRequest $request)
    {
        $user        = Auth::guard('api')->user();
        $referenceId = Request::query()->pluck('reference_id');


        $parameters = [
            'user_id'      => $user->id,
            'amount'       => $request->getAmout(),
            'type'         => $request->getType(),
            'description'  => $request->getDescription(),
            'reference_id' => $referenceId,
        ];
        requestService()->storeRequest($parameters);

        return $this->success(__('messages.request.success'));
    }

    /**
     * @param RequestStoreRequest $request
     * @param Request             $requestModel
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRequest(RequestStoreRequest $request, Request $requestModel)
    {
        $parameters = [
            'description' => $request->get('description'),
            'amount'      => $request->get('amount'),
            'type'        => $request->get('type'),
        ];

        requestService()->updateRequest($parameters, $requestModel);

        return $this->success(__('messages.request.success'));
    }
}
