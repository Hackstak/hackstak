@extends('layouts.app')
@section('title', 'Registration')

@section('head')
<link href="{{ URL::asset('css/registration.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="container">
            <form method="POST" action="{{ url('Auth/register') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
               {{ csrf_field() }}
                <h2>Registration Form</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="username" placeholder="Username" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_year" class="col-sm-3 control-label">School Year</label>
                    <div class="col-sm-9">
                        <select id="school_year" class="form-control">
                            <option value> -- select a grade -- </option>
                            <option>High School Student</option>
                            <option>Freshman</option>
                            <option>Sophomore</option>
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Graduate Student</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                        <input type="text" id="gender" placeholder="Gender" class="form-control">
                        <span class="help-block">eg. Attack Helicopter</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="team_name" class="col-sm-3 control-label">Team Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="team_name" placeholder="Team Name" class="form-control">
                        <span class="help-block">eg. Chef Boys-are-we</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="shirt_size" class="col-sm-3 control-label">Shirt Size</label>
                    <div class="col-sm-9">
                        <input type="text" id="shirt_size" placeholder="Shirt Size" class="form-control">
                        <span class="help-block">eg. S, M, L, XL</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="major" class="col-sm-3 control-label">Major</label>
                    <div class="col-sm-9">
                        <input type="text" id="major" placeholder="Major" class="form-control">
                        <span class="help-block">eg. Computer Science</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dietary_restrictions" class="col-sm-3 control-label">Dietary Restrictions</label>
                    <div class="col-sm-9">
                        <input type="text" id="dietary_restrictions" placeholder="Dietary Restrictions" class="form-control">
                        <span class="help-block">eg. Grade A Steak</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="special_needs" class="col-sm-3 control-label">Special Needs</label>
                    <div class="col-sm-9">
                        <input type="text" id="special_needs" placeholder="Special Needs" class="form-control">
                        <span class="help-block">eg. Bedtime Stories</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">I accept <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
@endsection
