<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user                    = auth()->user();
        $depositRequests         = requestService()->depositRequest(['user_id' => $user->id]);
        $withdrawRequests        = requestService()->withdrawRequest(['user_id' => $user->id]);
        $announcements           = announcementService()->publicAnnouncement();
        $chartDataDepositAction  = json_encode(requestService()->chartDataDeposit(['user_id' => $user->id]));
        $chartDataWithdrawAction = json_encode(requestService()->chartDataWithdraw(['user_id' => $user->id]));
        $completedScore          = documentService()->completedScore(['user_id' => auth()->id()]);

        return view('user.dashboard', compact('depositRequests', 'withdrawRequests', 'announcements', 'chartDataDepositAction', 'chartDataWithdrawAction', 'completedScore'));
    }
}
