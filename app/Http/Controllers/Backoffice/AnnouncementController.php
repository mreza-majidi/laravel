<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $announcements = Announcement::query()->orderBy('priority')
                                     ->paginate(12)
        ;

        return view('backoffice.users.general-message.index', compact('announcements'));
    }

    /**
     * @return Factory|View
     */
    public function createAction()
    {
        return view('backoffice.users.general-message.create');
    }

    /**
     * @param AnnouncementRequest $request
     *
     * @return RedirectResponse
     */
    public function storeAction(AnnouncementRequest $request)
    {
        $announcement = new Announcement();

        $announcement->setBegin(convertJalaliToCarbon($request->getBegin()));
        $announcement->setText($request->getText());
        $announcement->setEnd(convertJalaliToCarbon($request->getEnd()));
        $announcement->setIsActive($request->getIsActive());
        $announcement->setPriority($request->getPriority());
        $announcement->save();

        return redirect()->route('backoffice.announcement.index');
    }

    /**
     * @param Announcement $announcement
     *
     * @return Factory|View
     */
    public function editAction(Announcement $announcement)
    {
        return view('backoffice.users.general-message.edit', compact('announcement'));
    }

    /**
     * @param AnnouncementRequest $request
     * @param Announcement        $announcement
     *
     * @return RedirectResponse
     */
    public function updateAction(AnnouncementRequest $request, Announcement $announcement): RedirectResponse
    {
        $announcement->setBegin(convertJalaliToCarbon($request->getBegin()));
        $announcement->setEnd(convertJalaliToCarbon($request->getEnd()));
        $announcement->setText($request->getText());
        $announcement->setIsActive($request->getIsActive());
        $announcement->setPriority($request->getPriority());
        $announcement->save();

        return redirect()->route('backoffice.announcement.index');
    }

    /**
     * @param Announcement $announcement
     *
     * @return RedirectResponse
     *
     * @throws Exception
     */
    public function deleteAction(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();

        return redirect()->route('backoffice.announcement.index');
    }
}
