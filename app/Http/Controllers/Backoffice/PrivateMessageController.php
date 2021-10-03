<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrivateMessageRequest;
use App\Models\PrivateMessage;
use App\Models\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PrivateMessageController extends Controller
{
    /**
     * @return Factory|View
     */
    public function indexAction()
    {
        $messages = PrivateMessage::query()->paginate(2);

        return view('backoffice.private_message.index', compact('messages'));
    }

    /**
     * @return Factory|View
     */
    public function createAction()
    {
        $users = User::all();

        return view('backoffice.private_message.create', compact('users'));
    }


    /**
     * @param PrivateMessageRequest $request
     *
     * @return RedirectResponse
     */
    public function storeAction(PrivateMessageRequest $request)
    {
        $message = new PrivateMessage();
        $message->setTitle($request->getTitle());
        $message->setText($request->getText());
        $message->setUserId(User::findIdByUuid($request->getUser()));
        $message->save();

        return redirect()->route('backoffice.private_message.index');
    }

    /**
     * @param PrivateMessage $message
     *
     * @return Factory|View
     */
    public function editAction(PrivateMessage $message)
    {
        $users = User::all();

        return view('backoffice.private_message.edit', compact('message', 'users'));
    }

    /**
     * @param PrivateMessageRequest $request
     *
     * @param PrivateMessage        $message
     *
     * @return RedirectResponse
     */
    public function updateAction(PrivateMessageRequest $request, PrivateMessage $message)
    {
        $message->setTitle($request->getTitle());
        $message->setText($request->getText());
        $message->save();

        return redirect()->route('backoffice.private_message.index');
    }

    /**
     * @param PrivateMessage $message
     *
     * @return RedirectResponse
     *
     * @throws Exception
     */
    public function deleteAction(PrivateMessage $message)
    {
        $message->delete();

        return redirect()->route('backoffice.private_message.index');
    }
}
