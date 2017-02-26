<?php

namespace App\Http\Controllers;

use App\User;
use App\Hackathon;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function Index()
    {
        return view('index');
    }

    public function About()
    {
        return view('about');
    }

    public function Hackathons()
    {
        $hackathons = Hackathon::all();
        $color_strings = [ "statcard-info", "statcard-danger", "statcard-primary", "statcard-success", "statcard-warning"];
        return view('hackathons', compact('hackathons', 'color_strings'));
    }
}
