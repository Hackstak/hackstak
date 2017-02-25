<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;
use App\Hackathon;

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
        "checkin_begin" => "required"
      ]);

      Hackathon::insert([
        "name" => $request->input("name"),
        "start_date" => $request->input("startdate"),
        "end_date" => $request->input("enddate"),
        "address" => $request->input("address"),
        "city" => $request->input("city"),
        "state" => $request->input("state"),
        "zipcode" => $request->input("zipcode"),
        "registration_begin" => $request->input("registration_begin"),
        "registration_end" => $request->input("registration_end"),
        "checkin_begin" => $request->input("checkin_begin")  
      ]);





      return view('backend/dashboard')->with('success', 'Hackathon created!');
    }

    public function Administration()
    {
      return view('backend/admin');
    }

    public function Food()
    {
      return view('backend/food');
    }
}
