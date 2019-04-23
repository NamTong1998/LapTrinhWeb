<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserHistory;
use Carbon\Carbon;// time
use App\Models\Category;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    protected function redirectTo()
    {
        //User History
        $userHistory = new UserHistory();
        $userHistory->user_id = Auth::user()->id;
        $userHistory->ip = \Request::ip();
        $userHistory->user_agent = \Request::userAgent();
        $userHistory->save();

        //user
        $user = Auth::user();
        $user->last_login = Carbon::now();
        $user->save();

        //Role
        $isAdmin = Auth::user()->is_admin;
        if ($isAdmin == 1) {
            return '/admin/index';
        } else {
            return '/home/index';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/home/index');
    }

    public function showLoginForm()
    {
      $categories= Category::all();
        return view('auth.login',['categories'=>$categories]);

    }

    /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
        $this->username() => ['required', 'string'],
        'password' => ['required', 'string'],
        'g-recaptcha-response' => ['required', new \App\Rules\ValidRecaptcha]
    ]);
  }
}
