<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return User
     */
    public function indexAction(Request $request)
    {
        /** @var User $users */
        $users = User::filter($request->toArray())->with('profile')->paginate(12);

        return view('backoffice.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return string
     */
    public function showAction(User $user)
    {
        /** @var Profile $profile */
        $profile = $user->profile()->first();

        return view('backoffice.users.users-information.content', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return string
     */
    public function editAction(User $user)
    {
        /** @var Profile $profile */
        $profile = $user->profile()->first();

        return view('backoffice.users.edit', compact('user', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User          $user
     *
     * @return string
     *
     * @throws \Exception
     */
    public function updateAction(UpdateRequest $request, User $user)
    {
        $user->setStatus($request->getUserStatus());
        $user->save();

        /** @var Profile $userProfile */
        $userProfile = $user->makeOrFindProfile()->first();
        $userProfile->setFirstName($request->getFirstName());
        $userProfile->setLastName($request->getLastName());
        $userProfile->setMobileNumber($request->getMobileNumber());
        $userProfile->setNationalNumber($request->getNationalNumber());
        $userProfile->setAddress($request->getAddress());
        $userProfile->setBirthDate((new \DateTime($request->getBirthDate())));
        $userProfile->save();

        if ($request->isAvatar()) {
            $avatarFile = $request->getAvatarFile();
            uploadService()->uploadFileWithOwner($avatarFile, $userProfile->refresh());
        }

        return redirect()->route('backoffice_user_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return string
     */
    public function destroyAction(User $user)
    {
        return 'destroy';
    }

    /**
     * @param User $user
     *
     * @return boolean
     */
    public function verifyAction(User $user)
    {
        return $user->setVerificationStatus();
    }

    /**
     * @param User $user
     *
     * @return boolean
     */
    public function documentsAction(User $user)
    {
        $documents = $user->documentsWithTypeAndMedia()->whereHas('media')->get();

        return view('backoffice.users.documents', compact('user', 'documents'));
    }
}
