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

        return view('backend/finances', ['credits' => $credits, 'debits' => $debits]);
    }


    public function postFinances(Request $request)
    {
      $this->validate($request, [
        "name" => "required",
        "amount" => "required"
      ]);

      \DB::table("finance")
        ->insert(
            [
              "name" => $request->input("name"),
              "amount" => $request->input("amount"),
              "hackathon" => 1,
              "created_by" => 1,
              "updated_by" => 1
            ]);

      return redirect()->action("DashboardController@Finances");
    }
}
