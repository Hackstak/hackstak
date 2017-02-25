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
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function hackathons()
    {
        return view('hackathons');
    }
}
