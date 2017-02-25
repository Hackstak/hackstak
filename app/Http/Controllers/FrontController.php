<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('hackathons');
    }
}
