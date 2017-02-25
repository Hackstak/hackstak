<?php

namespace App\Http\Controllers;

use Auth;
use Hash;

use Illuminate\Http\Request;
use App\Finance;
use App\Hackathon;
use App\User;

class DashboardController extends Controller
{
    public function Dashboard()
    {
      $hackathons = json_decode(Hackathon::all());
      $color_strings = [ "statcard-info", "statcard-danger", "statcard-primary", "statcard-success", "statcard-warning"];
      return view('backend/dashboard', compact('hackathons', "color_strings"));
    }

    public function Finances()
    {
        $finances = Finance::all();
        $f = json_decode($finances);

        $credits = array_filter($f, function($var){ return $var->amount >= 0; });
        $debits = array_filter($f, function($var){ return $var->amount < 0; });

        return view('backend/finances', compact('credits', 'debits'));
    }


    public function PostFinances(Request $request)
    {
      $this->validate($request, [
        "name" => "required",
        "amount" => "required"
      ]);

      \DB::table("finances")
        ->insert(
            [
              "name" => $request->input("name"),
              "amount" => $request->input("amount"),
              "hackathon_id" => 1,
              "created_by" => 1,
              "updated_by" => 1
            ]);

      return redirect()->action("DashboardController@Finances");
    }

    public function CreateHackathon()
    {
      return view('backend/create_hackathon');
    }


    public function SubmitHackathon(Request $request)
    {

      $this->validate($request, [
        "name" => "required",
        "startdate" => "required",
        "enddate" => "required",
        "address" => "required",
        "city" => "required",
        "state" => "",
        "zipcode" => "required",
        "registration_begin" => "required",
        "registration_end" => "required",
        "checkin_begin" => "required",
        "checkin_end" => "required"
      ]);

      $hackathon = new Hackathon();
      $hackathon->name = $request->input("name");
      $hackathon->start_date = $request->input("startdate");
      $hackathon->end_date = $request->input("enddate");
      $hackathon->address = $request->input("address");
      $hackathon->city = $request->input("city");
      $hackathon->state = $request->input("state");
      $hackathon->zip = $request->input("zipcode");
      $hackathon->registration_begin = $request->input("registration_begin");
      $hackathon->registration_end = $request->input("registration_end");
      $hackathon->checkin_begin = $request->input("checkin_begin");
      $hackathon->checkin_end = $request->input("checkin_end");
      $hackathon->createdBy()->associate(Auth::user());
      $hackathon->save();

      return redirect()->action("DashboardController@Dashboard")->with('success', 'Hackathon created!');
    }

    public function Administration()
    {
      return view('backend/admin');
    }

    public function Food()
    {
      return view('backend/food');
    }

    public function Profile()
    {
      $user = User::where('id', Auth::user()->id)->first();
      return view('backend/profile', compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
      $user = User::where('id', Auth::user()->id)->first();
      $this->validate($request, [
        'first' => 'required|string|max:255',
        'last' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'phone' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,'.$user->id,
        'cpassword' => 'max:255',
        'password' => 'sometimes|max:255|confirmed',
        'password_confirmation' => 'sometimes|max:255',
        'birthday' => 'required|string|max:255',
        'school' => 'required|string|max:255',
        'major' => 'max:255',
        'school_year' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'shirt_size' => 'required|string|max:255',
        'dietary_restrictions' => 'max:255',
        'special_needs' => 'max:255',
      ]);

      $user->first = $request->first;
      $user->last = $request->last;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->username = $request->username;
      if($request->cpassword != "" && $request->password != "" && $request->password_confirmation != "")
      {
        if(strlen($request->password) >= 3)
        {
          if (Hash::check($request->cpassword, Auth::user()->password))
          {
            $user->password = bcrypt($request->password);
          } else
          {
            return redirect()->action('DashboardController@Profile')->withErrors("Your current password doesn't match the one you typed in.");
          }
        } else
        {
          return redirect()->action('DashboardController@Profile')->withErrors("Your new password must be longer than three characters.");
        }
      }
      $user->birthday = $request->birthday;
      $user->school = $request->school;
      $user->major = $request->major;
      $user->school_year = $request->school_year;
      $user->gender = $request->gender;
      $user->shirt_size = $request->shirt_size;
      $user->dietary_restrictions = $request->dietary_restrictions;
      $user->special_needs = $request->special_needs;
      $user->save();
      return redirect()->action('DashboardController@Profile')->with('success', 'Your profile has been updated!');
    }
}
