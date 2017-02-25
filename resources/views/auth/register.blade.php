@extends('layouts.app')
@section('title', 'Registration')

@section('head')
<link href="{{ URL::asset('css/registration.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="container">
  @include('subviews/messages')
            <form method="POST" action="{{ url('/register') }}" class="form-horizontal" role="form">
               {{ csrf_field() }}
                <h2>Registration Form</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="first" class="form-control" value="@if(old('first') != null){{old('first')}}@endif" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="last" class="form-control" value="@if(old('last') != null){{old('last')}}@endif" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email*</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" value="@if(old('email') != null){{old('email')}}@endif" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone*</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" value="@if(old('phone') != null){{old('phone')}}@endif" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username*</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" value="@if(old('username') != null){{old('username')}}@endif" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" name="birthday" value="@if(old('birthday') != null){{old('birthday')}}@endif" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school" class="col-sm-3 control-label">School*</label>
                    <div class="col-sm-9">
                        <input type="text" name="school" value="@if(old('school') != null){{old('school')}}@endif" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="major" class="col-sm-3 control-label">Major</label>
                    <div class="col-sm-9">
                        <input type="text" name="major" value="@if(old('major') != null){{old('major')}}@endif" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="school_year" class="col-sm-3 control-label">School Year*</label>
                    <div class="col-sm-9">
                        <select name="school_year" class="form-control" required>
                            <option value> -- select a grade -- </option>
                            <option>High School Student</option>
                            <option>Freshman</option>
                            <option>Sophomore</option>
                            <option>Junior</option>
                            <option>Senior</option>
                            <option>Graduate Student</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="gender" class="col-sm-3 control-label">Gender*</label>
                    <div class="col-sm-9">
                      <select name="gender" class="form-control" required>
                          <option value> -- select a gender -- </option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Other</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="team_name" class="col-sm-3 control-label">Team Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="team_name" value="@if(old('team_name') != null){{old('team_name')}}@endif" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="shirt_size" class="col-sm-3 control-label">Shirt Size*</label>
                    <div class="col-sm-9">
                      <select name="shirt_size" class="form-control" required>
                          <option value> -- select a size -- </option>
                          <option>XS</option>
                          <option>S</option>
                          <option>M</option>
                          <option>L</option>
                          <option>XL</option>
                          <option>XXL</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dietary_restrictions" class="col-sm-3 control-label">Dietary Restrictions</label>
                    <div class="col-sm-9">
                        <input type="text" name="dietary_restrictions" value="@if(old('dietary_restrictions') != null){{old('dietary_restrictions')}}@endif" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="special_needs" class="col-sm-3 control-label">Special Needs</label>
                    <div class="col-sm-9">
                        <input type="text" name="special_needs" value="@if(old('special_needs') != null){{old('special_needs')}}@endif" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="accept" required>I accept <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group"
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
@endsection
