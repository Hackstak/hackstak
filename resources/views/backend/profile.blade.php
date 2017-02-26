@extends('layouts.dashboard')
@section('title', 'Create Hackathon')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboard</h6>
      <h2 class="dashhead-title">My Profile</h2>
    </div>
    @include('subviews/messages')
  </div>
  <div class="hr-divider m-t-md m-b"></div>
  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <form method="POST" action="{{ url('/dashboard/profile') }}" class="form-horizontal" role="form">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">First Name*</label>
        <div class="col-sm-9">
          <input type="text" name="first" class="form-control" value="{{ $user->first }}" autofocus required>
        </div>
      </div>
      <div class="form-group">
        <label for="lastName" class="col-sm-3 control-label">Last Name*</label>
        <div class="col-sm-9">
          <input type="text" name="last" class="form-control" value="{{ $user->last }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email*</label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-3 control-label">Phone*</label>
        <div class="col-sm-9">
          <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username*</label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="cpassword" class="col-sm-3 control-label">Current Password</label>
        <div class="col-sm-9">
          <input type="password" name="cpassword" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-3 control-label">New Password</label>
        <div class="col-sm-9">
          <input type="password" name="password" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="password_confirmation" class="col-sm-3 control-label">Confirm New Password</label>
        <div class="col-sm-9">
          <input type="password" name="password_confirmation" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="birthday" class="col-sm-3 control-label">Date of Birth</label>
        <div class="col-sm-9">
          <input type="date" name="birthday" value="{{ $user->birthday }}" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="school" class="col-sm-3 control-label">School*</label>
        <div class="col-sm-9">
          <input type="text" name="school" value="{{ $user->school }}" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="major" class="col-sm-3 control-label">Major</label>
        <div class="col-sm-9">
          <input type="text" name="major" value="{{ $user->major }}" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="school_year" class="col-sm-3 control-label">School Year*</label>
        <div class="col-sm-9">
          <select name="school_year" class="form-control" required>
            <option value> -- select a grade -- </option>
            <option @if($user->school_year == "High School Student")selected @endif</option>)>High School Student</option>
            <option @if($user->school_year == "Freshman")selected @endif>Freshman</option>
            <option @if($user->school_year == "Sophomore")selected @endif>Sophomore</option>
            <option @if($user->school_year == "Junior")selected @endif>Junior</option>
            <option @if($user->school_year == "Senior")selected @endif>Senior</option>
            <option @if($user->school_year == "Graduate Student")selected @endif>Graduate Student</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="gender" class="col-sm-3 control-label">Gender*</label>
        <div class="col-sm-9">
          <select name="gender" class="form-control" required>
            <option value> -- select a gender -- </option>
            <option @if($user->gender == "Male")selected @endif>Male</option>
            <option @if($user->gender == "Female")selected @endif>Female</option>
            <option @if($user->gender == "Other")selected @endif>Other</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="shirt_size" class="col-sm-3 control-label">Shirt Size*</label>
        <div class="col-sm-9">
          <select name="shirt_size" class="form-control" required>
            <option value> -- select a size -- </option>
            <option @if($user->shirt_size == "XS")selected @endif>XS</option>
            <option @if($user->shirt_size == "S")selected @endif>S</option>
            <option @if($user->shirt_size == "M")selected @endif>M</option>
            <option @if($user->shirt_size == "L")selected @endif>L</option>
            <option @if($user->shirt_size == "XL")selected @endif>XL</option>
            <option @if($user->shirt_size == "XXL")selected @endif>XXL</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="dietary_restrictions" class="col-sm-3 control-label">Dietary Restrictions</label>
        <div class="col-sm-9">
          <input type="text" name="dietary_restrictions" value="{{ $user->dietary_restrictions }}" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="special_needs" class="col-sm-3 control-label">Special Needs</label>
        <div class="col-sm-9">
          <input type="text" name="special_needs" value="{{ $user->special_needs }}" class="form-control">
        </div>
      </div>
      <div class="form-group"
      <div class="col-sm-9 col-sm-offset-3">
        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
      </div>
    </div>
  </form>
</div>
@endsection
