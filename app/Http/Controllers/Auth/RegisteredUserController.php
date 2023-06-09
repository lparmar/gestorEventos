<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UsersProfile;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        Session::flash('tittle', 'Registrarse');
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('profesor/a');

        event(new Registered($user));

        Auth::login($user);

        $user = User::findOrFail(Auth::user()->id);
        $user->last_login = Carbon::now()->toDateTimeString();
        $user->save();


        $userProfile = new UsersProfile();
        $userProfile->name = $request->name;
        $userProfile->user_id = Auth::user()->id;
        $userProfile->save();

        $teacher = new Teacher();
        $teacher->user_id = Auth::user()->id;
        $teacher->save();


        return redirect('profile');
    }
}
