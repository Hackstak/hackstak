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

    public function Finances($id)
    {
        $finances = Finance::where('hackathon_id', $id)->get();
        if($finances != null)
        {
          $f = json_decode($finances);
          $credits = array_filter($f, function($var){ return $var->amount >= 0; });
          $debits = array_filter($f, function($var){ return $var->amount < 0; });
          $hackathon = Hackathon::where('id', $id)->first();
          return view('backend/finances', compact('credits', 'debits', 'hackathon'));
        }
        return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }


    public function PostFinances(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "amount" => "required"
      ]);

      $hackathon = Hackathon::where('id', $id)->first();
      $finance = new Finance();
      $finance->name = $request->input("name");
      $finance->amount = $request->input("amount");
      $finance->hackathon()->associate($hackathon);
      $finance->createdBy()->associate(Auth::user());
      $finance->updatedBy()->associate(Auth::user());
      $finance->save();

      return back()->with('success', 'Finance added!');
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

    public function ShowHackathon($id = null)
    {
      $hackathon = Hackathon::where('id', $id)->first();
      if(is_null($hackathon)) {
        return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
      }
      $user = Attendance::with('user')->where('hackathon_id', $hackathon->id)->where('user_id', Auth::user()->id)->first();
      $organizer = $user->organizer;
      $address = $hackathon->address.' '.$hackathon->city.', '.$hackathon->state.' '.$hackathon->zip;
      return view('backend/hackathon', compact('hackathon', 'organizer', 'address'));
    }

    public function Administration()
    {
      return view('backend/admin');
    }

    public function Food($id)
    {
      $foods = Food::where('hackathon_id', $id)->orderBy('total_estimate', 'asc')->get();
      if($foods != null)
      {
        $hackathon = Hackathon::where('id', $id)->first();
        return view('backend/food', compact('foods', 'hackathon'));
      }
      return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }

    public function PostFood(Request $request, $id)
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

      $hackathon = Hackathon::where('id', $id)->first();
      $food = new Food();
      $food->company = $request->input("company_name");
      $food->phone = $request->input("phone");
      $food->cost_per_person = $request->input("cost_per_person");
      $food->total_estimate = $request->input("total_estimate");
      $food->contacted = $request->input("contacted");
      $food->will_deliver = $request->input("will_deliver");
      $food->confirmed = $request->input("confirmed");
      $food->hackathon()->associate($hackathon);
      $food->save();

      return back()->with('success', 'Food added!');
    }

    public function Prize($id)
    {
      $prizes = Prize::where('hackathon_id', $id)->orderBy('cost_per_item', 'asc')->get();
      if($prizes != null)
      {
        $hackathon = Hackathon::where('id', $id)->first();
        return view('backend/prize', compact('prizes', 'hackathon'));
      }
      return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }

    public function PostPrize(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "link" => "required",
        "cost_per_item" => "required",
        "total_per_team" => "required",
        "purchased" => "required",
        "delivered" => "required"
      ]);

      $hackathon = Hackathon::where('id', $id)->first();
      $prize = new Prize();
      $prize->name = $request->input("name");
      $prize->link = $request->input("link");
      $prize->cost_per_item = $request->input("cost_per_item");
      $prize->total_per_team = $request->input("total_per_team");
      $prize->purchased = $request->input("purchased");
      $prize->delivered = $request->input("delivered");
      $prize->hackathon()->associate($hackathon);
      $prize->save();

      return back()->with('success', 'Prize added!');
    }

    public function Sponsor($id)
    {
      $sponsors = Sponsor::where('hackathon_id', $id)->orderBy('contribution', 'desc')->get();
      if($sponsors != null)
      {
        $hackathon = Hackathon::where('id', $id)->first();
        return view('backend/sponsor', compact('sponsors', 'hackathon'));
      }
      return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }

    public function PostSponsor(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "email" => "required",
        "phone" => "required",
        "contribution" => "required",
        "contacted" => "required",
        "confirmed" => "required"
      ]);
      $hackathon = Hackathon::where('id', $id)->first();
      $sponsor = new Sponsor();
      $sponsor->name = $request->input("name");
      $sponsor->email = $request->input("email");
      $sponsor->phone = $request->input("phone");
      $sponsor->contribution = $request->input("contribution");
      $sponsor->contacted = $request->input("contacted");
      $sponsor->confirmed = $request->input("confirmed");
      $sponsor->hackathon()->associate($hackathon);
      $sponsor->save();

      return back()->with('success', 'Sponsor added!');
    }

    public function Talk($id)
    {
      $talks = TechTalk::where('hackathon_id', $id)->orderBy('start_time', 'asc')->get();
      if($talks != null)
      {
        $hackathon = Hackathon::where('id', $id)->first();
        return view('backend/talk', compact('talks', 'hackathon'));
      }
      return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }

    public function PostTalk(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "presenter" => "required",
        "start_time" => "required",
        "end_time" => "required",
        "confirmed" => "required"
      ]);

      $hackathon = Hackathon::where('id', $id)->first();
      $talk = new TechTalk();
      $talk->name = $request->input("name");
      $talk->presenter = $request->input("presenter");
      $talk->start_time = $request->input("start_time");
      $talk->confirmed = $request->input("confirmed");
      $talk->end_time = $request->input("end_time");
      $talk->hackathon()->associate($hackathon);
      $talk->save();

      return back()->with('success', 'Tech Talk added!');
    }

    public function Theme($id)
    {
      $themes = ThemeIdea::where('hackathon_id', $id)->get();
      if($themes != null)
      {
        $hackathon = Hackathon::where('id', $id)->first();
        return view('backend/theme', compact('themes', 'hackathon'));
      }
      return redirect()->action("DashboardController@Dashboard")->withErrors("Event does not exist!");
    }

    public function PostTheme(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "confirmed" => "required"
      ]);

      $hackathon = Hackathon::where('id', $id)->first();
      $theme = new ThemeIdea();
      $theme->name = $request->input("name");
      $theme->confirmed = $request->input("confirmed");
      $theme->hackathon()->associate($hackathon);
      $theme->save();

      return back()->with('success', 'Theme added!');
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


    public function RegisterForEvent()
    {

      return redirect()->action('DashboardController@Dashboard')->with('success', 'You have registered for the event!');


    }
}
