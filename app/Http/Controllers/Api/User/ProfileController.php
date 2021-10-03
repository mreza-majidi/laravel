<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Auth;

class ProfileController extends Controller
{


    /**
     * @param ProfileRequest $request
     *
     * @return ProfileResource
     */
    public function store(ProfileRequest $request)
    {
        $user = Auth::guard('api')->user();

        $parameters = [
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'mobile_number'   => $request->input('mobile_number'),
            'address'         => $request->input('address'),
            'national_number' => $request->input('national_number'),
            'user_id'         => $user->id,
            'has_avatar'      => $request->hasFile('avatar'),
            'avatar'          => $request->file('avatar'),
        ];

        profileService()->store($parameters);

        return $this->success(__('messages.profile_messages.success'));
    }

    /**
     * @param Profile $profile
     *
     * @return ProfileResource
     */
    public function show(Profile $profile)
    {
        $user_id = Auth::guard('api')->user()->id;

        return new ProfileResource($user_id, $profile);
    }

    /**
     * @param ProfileRequest $request
     * @param Profile        $profile
     *
     * @return ProfileResource
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        $parameters = [
            'first_name'      => $request->input('first_name'),
            'last_name'       => $request->input('last_name'),
            'mobile_number'   => $request->input('mobile_number'),
            'address'         => $request->input('address'),
            'national_number' => $request->input('national_number'),
            'has_avatar'      => $request->hasFile('avatar'),
            'avatar'          => $request->file('avatar'),
        ];
        profileService()->update($parameters, $profile);

        return $this->success(__('messages.profile_messages.success'));
    }
}
