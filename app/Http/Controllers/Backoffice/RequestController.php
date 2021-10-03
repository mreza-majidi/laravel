<?php

namespace App\Http\Controllers\Backoffice;

use App\Constants\RequestConstants;
use App\Http\Controllers\Controller;
use App\ModelFilters\RequestFilter;
use App\Models\Request;
use App\Models\Wallet;
use Illuminate\Http\Request as RequestHttp;

class RequestController extends Controller
{

    /**
     * @param RequestHttp $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(RequestHttp $request)
    {
        $requestModel = Request::filter($request->toArray())->with(['user.profile'])->orderBy('created_at', 'DESC')->paginate(12);

        return view('backoffice.request.index', compact('requestModel'));
    }

    /**
     * @param Request     $request
     *
     * @param RequestHttp $http
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function acceptAction(Request $request, RequestHttp $http)
    {
        $request->status = RequestConstants::REQUEST_STATUS_ACCEPTED;
        $wallet          = Wallet::query()->where('id', $request->wallet_id)->first();

        if ($request->type == RequestConstants::TYPE_DEPOSIT) {
            /** @var Wallet $wallet */
            $total = $wallet->balance + $request->amount;

        }
        if ($request->type == RequestConstants::TYPE_WITHDRAW) {
            $total = $wallet->balance - $request->amount;
        }
        $wallet->setBalance($total);
        $wallet->save();
        if ($http->has('description')) {
            $request->setDescription($http->get('description'));
        }
        $request->save();

        return back();
    }

    /**
     * @param Request     $request
     *
     * @param RequestHttp $http
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rejectAction(Request $request, RequestHttp $http)
    {
        if ($request->status == RequestConstants::REQUEST_STATUS_ACCEPTED) {
            $wallet = Wallet::query()->where('id', $request->wallet_id)->first();
            if ($request->type == RequestConstants::TYPE_DEPOSIT) {
                /** @var Wallet $wallet */
                $total = $wallet->balance - $request->amount;
            }
            if ($request->type == RequestConstants::TYPE_WITHDRAW) {
                $total = $wallet->balance + $request->amount;
            }
            $wallet->setBalance($total);
            $wallet->save();
        }
        $request->status = RequestConstants::REQUEST_STATUS_REJECTED;
        $request->setDescription($http->get('description'));
        $request->save();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Request $request
     *
     * @return void
     */
    public function showAction(Request $request)
    {
        return view('backoffice.request.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Request $request
     *
     * @return void
     */
    public function edit(Request $request): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Request      $requestModel
     *
     * @return void
     */
    public function update(Request $request, Request $requestModel): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Request $request
     *
     * @return void
     */
    public function destroy(Request $request)
    {
        //
    }
}
