<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function GetLogin()
    {
      return view ('auth/login');
    }

    public function Login(Request $request)
    {
      $this->validate($request, [
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
      ]);

      if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->intended('dashboard');
      } else {
        return redirect()->action('Auth\AuthController@GetLogin')->withErrors("Invalid username or password.");
      }
    }

    public function GetLogout()
    {
      Auth::logout();
      return view('index');
    }

    public function GetRegister()
    {
      return view('auth/register');
    }

    public function Register(Request $request)
    {
      $this->validate($request, [
        'first' => 'required|string|max:255',
        'last' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'phone' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'string|min:3|max:255|confirmed',
        'password_confirmation' => 'string|min:3|max:255',
        'birthday' => 'required|string|max:255',
        'school' => 'required|string|max:255',
        'major' => 'string|max:255',
        'school_year' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'team_name' => 'string|max:255',
        'shirt_size' => 'required|string|max:255',
        'dietary_restrictions' => 'string|max:255',
        'special_needs' => 'string|max:255',
      ]);

      $user = new User();
      $user->first = $request->first;
      $user->last = $request->last;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->phone = $request->phone;
      $user->password = bcrypt($request->password);
      $user->birthday = $request->birthday;
      $user->school = $request->school;
      $user->major = $request->major;
      $user->school_year = $request->school_year;
      $user->gender = $request->gender;
      $user->team_name = $request->team_name;
      $user->shirt_size = $request->shirt_size;
      $user->dietary_restrictions = $request->dietary_restrictions;
      $user->special_needs = $request->special_needs;
      $user->save();

      if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->intended('dashboard');
      } else {
        return redirect()->action('Auth\AuthController@GetLogin')->withErrors("Unable to log you in.");
      }
    }
}
