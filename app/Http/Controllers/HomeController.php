<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        return view('home');
    }

    public function Hackathons()
    {
        return view('hackathons');
    }

    public function About()
    {
        return view('about');
    }
}
