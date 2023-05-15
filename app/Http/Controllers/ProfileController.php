<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UsersProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $userProfile = UsersProfile::where('user_id',$request->user()->id)->first();
        return view('profile.edit', [
            'userProfile' => $userProfile, 'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, UsersProfile $userProfile): RedirectResponse
    {

        $userProfile->update([
            'name' => $request->name,
            'surname_first' => $request->surname_first,
            'surname_second' => $request->surname_second,
            'birthdate' => $request->birthdate,

        ]);

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user =  User::where('id',$userProfile->user_id)->first();
        $user->update([
            'email' => $request->email,
        ]);

        $request->user()->save();

        return Redirect::to('profile');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
