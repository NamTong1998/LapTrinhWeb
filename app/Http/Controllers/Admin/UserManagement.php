<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Session;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Hash;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('layouts.admin.user_management.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.admin.user_management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'is_admin' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $users = new User([
            'user_name' => $request->get('user_name'),
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender'),
            'initals' => $request->get('initals'),
            'affiliation' => $request->get('affiliation'),
            'is_admin'=> $request->get('is_admin'),
            'phone' => $request->get('phone'),
            'fax' => $request->get('fax'),
            'country' => $request->get('country'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'image' => env('AVATAR_DEFAULT'),
        ]);

        if ($users->save())
        {
            $noti = new NotificationController();
            $noti->saveNoti($users->user_name, "joined as an user", "");

            return redirect()->route('admin_users_list')->with('success', $users->username.' has been added as an user.');
        }
        else
            return redirect()->route('admin_users_create')->with('error', 'Error in creating a new user.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User::find($id);

        return view('layouts.admin.user_management.edit', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        return view('layouts.admin.user_management.edit', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        $noti = new NotificationController();
        $noti->saveNoti($user->user_name, "was removed from users", "");

        return redirect()->route('admin_users_list')->with('success', $user->username.' has been removed.');
    }

    public function role()
    {
        $users = User::all();
        $roles = Role::all();
        return view('layouts.admin.user_management.role', ['users' => $users, 'roles' => $roles]);
    }

    public function setRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->get('role_id');
        $user->save();

        $noti = new NotificationController();
        $noti->saveNoti($user->user_name, "was promoted as an ".$user->role->name, "");

        return redirect()->route('admin_users_role');
    }
}
