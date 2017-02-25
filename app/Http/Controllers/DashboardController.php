<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Finance;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        return view('backend/dashboard');
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
