<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     *
     * @return ProfileResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $user      = auth()->user();
        $parameter = ['user' => $user];

        $profile = profileService()->index($parameter);

        return view('user.user-profile.profile', compact('profile', 'user'));
    }

    /**
     * @param ProfileRequest $request
     * @param Profile        $profile
     *
     * @return Translator|string
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $parameters = [
            'profile'         => $profile,
            'first_name'      => $request->getFirstName(),
            'last_name'       => $request->getLastName(),
            'mobile_number'   => $request->getMobileNumber(),
            'address'         => $request->getAddress(),
            'national_number' => $request->getNationalNumber(),
            'birth_date'      => $request->getBirthDate(),
            'has_avatar'      => $request->isAvatar(),
            'avatar'          => $request->getAvatarFile(),
        ];
        profileService()->update($parameters);

        return redirect()->route('website.web.user.profile.show')->with('message', __('messages.profile_messages.success'));
    }
}
