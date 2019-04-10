<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserProfileController extends HomeController
{
    const AVATAR_FOLDER = 'users_avatar';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('layouts.home.profile.view',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::find($id);

        return view('layouts.home.profile.edit',compact('user'));
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
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'affiliation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        ]);

        $user = User::find($id);

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put(self::AVATAR_FOLDER, $request->image);
            if(!$user->image == env('AVATAR_DEFAULT')){
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $path;
        }
        $user->user_name = $request->get('user_name');
        $user->first_name = $request->get('first_name');
        $user->middle_name = $request->get('middle_name');
        $user->last_name = $request->get('last_name');
        $user->gender = $request->get('gender');
        $user->initals = $request->get('initals');
        $user->affiliation = $request->get('affiliation');
        $user->phone = $request->get('phone');
        $user->fax = $request->get('fax');
        $user->country = $request->get('country');
        if(!($user->email == $request->get('email')))
            $user->email = $request->get('email');

        if($user->save()){
            return redirect()->route('home_profile_view')->with('success', 'User has been update successfully');
        }else{
            return redirect()->back()->with('errors', 'Error');
        } 
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
    }
}
