<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('settings.profile', ['user' => auth()->user()]);
    }

    public function update(ProfileRequest $request)
    {
        $profile = $request->user();
        $profileData = $request->all();

        if($request->hasFile('profile_picture'))
        {
            $picture = $request->profile_picture;
            $fileName = "profile-image-{$profile->id}.".$picture->getClientOriginalExtension();
            $picture->move(public_path('images'), $fileName);
            $profileData['profile_picture'] = $fileName;
        }

        $profile->update($profileData);
        return back()->with('message', 'Porfile has been updated');
    }

}
