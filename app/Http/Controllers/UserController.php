<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\ResettingPasswords;
use App\Models\Activity;
use App\Models\BodyActivity;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UsersProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('email', 'asc')->paginate(4);
        $bodyActivities = BodyActivity::all();
        Session::flash('tittle', 'Listado de usuarios');
        return view('users.index', [
            'users' => $users, 'bodyActivities' => $bodyActivities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $user->save();

        $user->assignRole('profesor/a');
        $userProfile = new UsersProfile();
        $userProfile->name = $request->name;
        $userProfile->user_id = $user->id;
        $userProfile->save();

        $teacher = new Teacher();
        $teacher->user_id = $user->id;
        $teacher->center_code = $request->code_center;
        $teacher->save();

        Session::flash('message', 'Usuario creado correctamente.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        Session::flash('tittle', 'Mis datos');
        return view('users.show', [
            'user' => $user, 'userProfile' => $user->userProfile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $image = $user->userProfile->getMedia('users_avatar')->first();
        Session::flash('tittle', 'Editar perfil');
        return view('users.edit', [
            'user' => $user, 'userProfile' => $user->userProfile, 'image' => $image,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsersProfile $user)
    {
        //
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $userUpdate = User::where('id', $user->user_id)->first();
        $userUpdate->update([
            'dni' => $request->dni,
            'email' => $request->email,
        ]);

        $user->update([
            'name' => $request->name,
            'surname_first' => $request->surname_first,
            'surname_second' => $request->surname_second,
            'birthdate' => $request->birthdate,

        ]);

        if ($request->has('image')) {
            $user->addMediaFromRequest('image')->toMediaCollection('users_avatar');
        }

        Session::flash('message', 'Usuario actualizado correctamente.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        Session::flash('delete', "Usuario " . $user->email . " eliminado correctamente.");
        return Redirect::to('users');
    }

    public function trashed()
    {
        //
        Session::flash('tittle', 'Usuarios eliminados');
        $users = User::onlyTrashed()->get();
        return view('users.trashed', ['users' => $users]);
    }

    public function deleting($id)
    {

        User::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return redirect()->back();
    }

    public function deleteAll()
    {

        User::onlyTrashed()
            ->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        User::withTrashed()
            ->where('id', $id)
            ->restore();

        UsersProfile::withTrashed()
            ->where('user_id', $id)
            ->restore();

        return redirect()->back();
    }

    public function resettingPasswords(ResettingPasswords $request, UsersProfile $userProfiles): RedirectResponse
    {
        if ($userProfiles->user->update([
            'password' => Hash::make($request->password)
        ])) {
            Session::flash('message', 'Contraseña actualizada correctamente.');
        } else {
            Session::flash('customErrors', 'La contraseña actual no es correcta.');
        }

        return Redirect::to('users');
    }
}
