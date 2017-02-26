<?php

namespace App\Http\Controllers;

use Auth;
use Hash;

use Illuminate\Http\Request;
use App\Finance;
use App\Hackathon;
use App\User;
use App\Food;
use App\Prize;
use App\Sponsor;
use App\ThemeIdea;
use App\TechTalk;

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

      Finance::insert(
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
      $foods = json_decode(Food::all());
      return view('backend/food', compact('foods'));
    }

    public function PostFood(Request $request)
    {
      $this->validate($request, [
        "company_name" => "required",
        "phone" => "required",
        "cost_per_person" => "required",
        "total_estimate" => "required",
        "contacted" => "required",
        "will_deliver" => "required",
        "confirmed" => "required"
      ]);

      Food::insert(
            [
              "company" => $request->input("company_name"),
              "phone" => $request->input("phone"),
              "cost_per_person" => $request->input("cost_per_person"),
              "total_estimate" => $request->input("total_estimate"),
              "contacted" => $request->input("contacted"),
              "will_deliver" => $request->input("will_deliver"),
              "confirmed" => $request->input("confirmed"),
              "hackathon_id" => 1
            ]);

      return redirect()->action("DashboardController@Food");
    }

    public function Prize()
    {
      $prizes = json_decode(Prize::all());
      return view('backend/prize', compact('prizes'));
    }

    public function PostPrize(Request $request)
    {
      $this->validate($request, [
        "name" => "required",
        "link" => "required",
        "cost_per_item" => "required",
        "total_per_team" => "required",
        "purchased" => "required",
        "delivered" => "required"
      ]);

      Prize::insert(
            [
              "name" => $request->input("name"),
              "link" => $request->input("link"),
              "cost_per_item" => $request->input("cost_per_item"),
              "total_per_team" => $request->input("total_per_team"),
              "purchased" => $request->input("purchased"),
              "delivered" => $request->input("delivered"),
              "hackathon_id" => 1
            ]);

      return redirect()->action("DashboardController@Prize");
    }

    public function Sponsor()
    {
      $sponsors = json_decode(Sponsor::all());
      return view('backend/sponsor', compact('sponsors'));
    }

    public function PostSponsor(Request $request)
    {

      $this->validate($request, [
        "name" => "required",
        "email" => "required",
        "phone" => "required",
        "contribution" => "required",
        "contacted" => "required",
        "confirmed" => "required"
      ]);

      Sponsor::insert(
            [
              "name" => $request->input("name"),
              "email" => $request->input("email"),
              "phone" => $request->input("phone"),
              "contribution" => $request->input("contribution"),
              "contacted" => $request->input("contacted"),
              "confirmed" => $request->input("confirmed"),
              "hackathon_id" => 1
            ]);

      return redirect()->action("DashboardController@Sponsor");
    }

    public function Talk()
    {
      $talks = json_decode(TechTalk::all());
      return view('backend/talk', compact('talks'));
    }

    public function PostTalk(Request $request)
    {

      $this->validate($request, [
        "name" => "required",
        "presenter" => "required",
        "start_time" => "required",
        "end_time" => "required",
        "confirmed" => "required"
      ]);

      TechTalk::insert(
            [
              "name" => $request->input("name"),
              "presenter" => $request->input("presenter"),
              "start_time" => $request->input("start_time"),
              "confirmed" => $request->input("confirmed"),
              "end_time" => $request->input("end_time"),
              "hackathon_id" => 1
            ]);

      return redirect()->action("DashboardController@Talk");
    }

    public function Theme()
    {
      $themes = json_decode(ThemeIdea::all());
      return view('backend/theme', compact('themes'));
    }

    public function PostTheme(Request $request)
    {
      $this->validate($request, [
        "name" => "required",
        "confirmed" => "required"
      ]);

      ThemeIdea::insert(
            [
              "name" => $request->input("name"),
              "confirmed" => $request->input("confirmed"),
              "hackathon_id" => 1
            ]);

      return redirect()->action("DashboardController@Theme");
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
