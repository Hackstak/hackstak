<?php

namespace App\Http\Controllers;

use Auth;
use Hash;

use Illuminate\Http\Request;
use App\Finance;
use App\Attendance;
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
      $hackathons = Attendance::with('user', 'hackathon')->where('user_id', Auth::user()->id)->get();
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
        "name" => "required|string|max:255",
        "startdate" => "required",
        "enddate" => "required",
        "address" => "required|string|max:255",
        "city" => "required|string|max:255",
        "state" => "required|string|max:255",
        "zipcode" => "required|string|max:255",
        "registration_begin" => "required",
        "registration_end" => "required",
        "checkin_begin" => "required",
        "checkin_end" => "required",
        "website" => "max:255",
        "facebook" => "max:255",
        "instagram" => "max:255",
        "twitter" => "max:255"
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
      $hackathon->website = $request->input("website");
      $hackathon->facebook = $request->input("facebook");
      $hackathon->instagram = $request->input("instagram");
      $hackathon->twitter = $request->input("twitter");
      $hackathon->createdBy()->associate(Auth::user());
      $hackathon->save();

      $attendance = new Attendance();
      $attendance->user()->associate(Auth::user());
      $attendance->hackathon()->associate($hackathon);
      $attendance->organizer = 1;
      $attendance->registered = 1;
      $attendance->accepted = 0;
      $attendance->rsvp = 0;
      $attendance->checked_in = 0;
      $attendance->team_name = "Organizers";
      $attendance->save();

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

      $user->first = $request->input('first');
      $user->last = $request->input('last');
      $user->email = $request->input('email');
      $user->phone = $request->input('phone');
      $user->username = $request->input('username');
      if($request->input('cpassword') != "" && $request->input('password') != "" && $request->input('password_confirmation') != "")
      {
        if(strlen($request->input('password')) >= 3)
        {
          if (Hash::check($request->input('cpassword'), Auth::user()->input('password')))
          {
            $user->password = bcrypt($request->input('password'));
          } else
          {
            return redirect()->action('DashboardController@Profile')->withErrors("Your current password doesn't match the one you typed in.");
          }
        } else
        {
          return redirect()->action('DashboardController@Profile')->withErrors("Your new password must be longer than three characters.");
        }
      }
      $user->birthday = $request->input('birthday');
      $user->school = $request->input('school');
      $user->major = $request->input('major');
      $user->school_year = $request->input('school_year');
      $user->gender = $request->input('gender');
      $user->shirt_size = $request->input('shirt_size');
      $user->dietary_restrictions = $request->input('dietary_restrictions');
      $user->special_needs = $request->input('special_needs');
      $user->save();
      return redirect()->action('DashboardController@Profile')->with('success', 'Your profile has been updated!');
    }
}
