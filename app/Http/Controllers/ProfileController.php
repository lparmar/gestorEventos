<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Users\ResettingPasswords;
use App\Models\BodyActivity;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UsersProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $userProfile = UsersProfile::where('user_id', $request->user()->id)->first();
        $image = $userProfile->getMedia('users_avatar')->first();
        $bodyActivities = BodyActivity::all();
        return view('profile.edit', [
            'userProfile' => $userProfile, 'user' => $request->user(), 'image' => $image, 'bodyActivities' => $bodyActivities
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

        $user =  User::where('id', $userProfile->user_id)->first();
        $user->update([
            'dni' => $request->dni,
            'email' => $request->email,
        ]);
        if ($user->roles()->first()->name !== 'admin') {
            $teacher = Teacher::where('user_id', $userProfile->user_id)->first();
            $teacher->update([
                'teaching_body' => $request->bodyTeacher,
            ]);
        }


        $request->user()->save();

        if ($request->has('image')) {
            $userProfile->addMediaFromRequest('image')->toMediaCollection('users_avatar');
        }

        Session::flash('message', 'Perfil actualizado correctamente.');
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

    public function resettingPasswords(ResettingPasswords $request, UsersProfile $userProfiles): RedirectResponse
    {
        if (Hash::check($request->current_password, $userProfiles->user->password)) {
            $userProfiles->user->update([
                'password' => Hash::make($request->password)
            ]);

            Session::flash('message', 'Contraseña actualizada correctamente.');
        } else {
            Session::flash('customErrors', 'La contraseña actual no es correcta.');
        }

        return Redirect::to('profile');
    }
}
