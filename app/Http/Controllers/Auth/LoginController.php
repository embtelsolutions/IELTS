<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('admin.login-user');
    }

    public function authenticate(Request $request){

        // return $request->username . ' ' . $request->password;
        $this->validate($request, [
          'email'   => 'required',
          'password' => 'required'
        ]);

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );
    
        if (Auth::guard('user')->attempt($userdata))
        {
            return redirect()->route('front.index');
        }
        return redirect()->back()->with('alert','Username and Password Not Matched');
      }
  
      public function logout() {
            Auth::guard('user')->logout();
            session()->flash('message','Logout Successfully');
            return redirect()->route('admin.login-user');
      }
}
