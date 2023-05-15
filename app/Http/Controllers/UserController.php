<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('username', 'asc')->get();
        return view('users.index', [
            'users' => $users,
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
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $user->save();

        $userProfile = new UsersProfile();
        $userProfile->name = $request->name;
        $userProfile->user_id = $user->id;
        $userProfile->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        Session::flash('tittle','Editar perfil');
        return view('users.edit', [
            'user' => $user, 'userProfile' => $user->userProfile,
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

        $userUpdate = User::where('id',$user->user_id)->first();
        $userUpdate->update([
            'email' => $request->email,
        ]);

        $user->update([
            'name' => $request->name,
            'surname_first' => $request->surname_first,
            'surname_second' => $request->surname_second,
            'birthdate' => $request->birthdate,

        ]);

        Session::flash('message','Usuario actualizado correctamente.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
    }
}
