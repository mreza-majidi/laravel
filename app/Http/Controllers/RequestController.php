<?php

namespace App\Http\Controllers;

use App\Constants\RequestConstants;
use App\Http\Requests\RequestStoreRequest;
use App\Models\Request;
use Illuminate\Database\Eloquent\Collection;

class RequestController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function index()
    {
        $requests = requestService()->index(['user_id' => auth()->user()->id]);

        return view('user.request.index', compact('requests'));
    }


    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $walletTypes = walletService()->getWallets(['user_id' => auth()->user()->id]);

        return view('user.request.view.content', compact('request', 'walletTypes'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $walletTypes = walletService()->getWallets(['user_id' => auth()->user()->id]);

        return view('user.user-profile.request', compact('walletTypes'));
    }

    /**
     * @param RequestStoreRequest $request
     *
     * @return string
     */
    public function store(RequestStoreRequest $request): string
    {
        $user       = auth()->user();
        $parameters = [
            'user_id'     => $user->id,
            'amount'      => $request->getAmout(),
            'type'        => $request->getType(),
            'wallet_id'   => $request->getWalletId(),
            'description' => $request->getDescription(),
        ];
        requestService()->storeRequest($parameters);

        return redirect()->route('website.web.user.request.index')->with('message', __('Success Request'));
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    public function edit(Request $request): string
    {
        if ($request->status != RequestConstants::REQUEST_STATUS_PENDING) {
            abort(404);
        }
        $walletTypes = walletService()->getWallets(['user_id' => auth()->user()->id]);

        return view('user.request.edit', compact('request', 'walletTypes'));
    }

    /**
     * @param RequestStoreRequest $requestHttp
     * @param Request             $request
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function update(RequestStoreRequest $requestHttp, Request $request)
    {
        $parameters = [
            'description' => $requestHttp->get('description'),
            'amount'      => $requestHttp->get('amount'),
            'wallet_id'   => $requestHttp->getWalletId(),
            'type'        => $requestHttp->get('type'),
        ];

        requestService()->updateRequest($parameters, $request);

        $message = __('Edit Request');

        return redirect()->route('website.web.user.request.index')->with('message', $message);
    }
}
