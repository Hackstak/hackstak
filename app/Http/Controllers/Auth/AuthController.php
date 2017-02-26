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

      if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
        return redirect()->intended('dashboard');
      } else {
        return redirect()->action('Auth\AuthController@GetLogin')->withErrors("Invalid username or password.");
      }
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
        'password' => 'required|string|min:3|max:255|confirmed',
        'password_confirmation' => 'required|string|min:3|max:255',
        'birthday' => 'required|string|max:255',
        'school' => 'required|string|max:255',
        'major' => 'max:255',
        'school_year' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'shirt_size' => 'required|string|max:255',
        'dietary_restrictions' => 'max:255',
        'special_needs' => 'max:255',
      ]);

      $user = new User();
      $user->first = $request->input('first');
      $user->last = $request->input('last');
      $user->email = $request->input('email');
      $user->username = $request->input('username');
      $user->phone = $request->input('phone');
      $user->password = bcrypt($request->input('password'));
      $user->birthday = $request->input('birthday');
      $user->school = $request->input('school');
      $user->major = $request->input('major');
      $user->school_year = $request->input('school_year');
      $user->gender = $request->input('gender');
      $user->shirt_size = $request->input('shirt_size');
      $user->dietary_restrictions = $request->input('dietary_restrictions');
      $user->special_needs = $request->input('special_needs');
      $user->save();

      if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
        return redirect()->intended('dashboard');
      } else {
        return redirect()->action('Auth\AuthController@GetLogin')->withErrors("Unable to log you in.");
      }
    }
}
