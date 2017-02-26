@extends('layouts.dashboard')
@section('title', 'Create Hackathon')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboard</h6>
      <h2 class="dashhead-title">Edit Hackathon</h2>
    </div>
    @include('subviews/messages')
  </div>
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Edit Event</h3>
  </div>
  <div class="col-xs-12 col-md-8 col-md-offset-2">
  <form method="POST" action="{{ url('/dashboard/events/edit/'.$hackathon->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name" class="control-label">Event Name</label>
      <input type="text" name="name" value="{{ $hackathon->name }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="startdate" class="control-label">Start Date</label>
      <input type="date" name="startdate" value="{{ $hackathon->start_date }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="enddate" class="control-label">End Date</label>
      <input type="date" name="enddate" value="{{ $hackathon->end_date }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="address" class="control-label">Address</label>
      <input type="text" name="address" value="{{ $hackathon->address }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="city" class="control-label">City</label>
      <input type="text" name="city" value="{{ $hackathon->city }}" class="form-control" required autofocus>
    </div>
    <div class="form-group">
      <label for="state" class="control-label">State</label>
        <select name="state" class="form-control">
          <option value> -- select a state -- </option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA" @if($hackathon->state == "Iowa")selected @endif>Iowa</option>
          <option value="KS" @if($hackathon->state == "Kansas")selected @endif>Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
    </div>
    <div class="form-group">
      <label for="zipcode" class="control-label">Zip Code</label>
      <input type="text" name="zipcode" value="{{ $hackathon->zip }}" class="form-control" required autofocus>
    </div>
    <div class="form-group">
      <label for="registration_begin" class="control-label">Registration Begin</label>
      <input type="datetime-local" name="registration_begin" value="{{ date("Y-m-d\TH:i:s", strtotime($hackathon->registration_begin )) }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="registration_end" class="control-label">Registration End</label>
      <input type="datetime-local" name="registration_end" value="{{ date("Y-m-d\TH:i:s", strtotime($hackathon->end )) }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="checkin_begin" class="control-label">Check-in Begin</label>
      <input type="datetime-local" name="checkin_begin" value="{{ date("Y-m-d\TH:i:s", strtotime($hackathon->checkin_begin )) }}" class="form-control" autofocus required>
    </div>
    <div class="form-group">
      <label for="checkin_end" class="control-label">Check-in End</label>
      <input type="datetime-local" name="checkin_end" value="{{ date("Y-m-d\TH:i:s", strtotime($hackathon->checkin_end )) }}" class="form-control" autofocus>
    </div>
    <div class="form-group">
      <label for="website" class="control-label">Website</label>
      <input type="text" name="website" value="{{ $hackathon->website }}" class="form-control" autofocus>
    </div>
    <div class="form-group">
      <label for="facebook" class="control-label">Facebook</label>
      <input type="text" name="facebook" value="{{ $hackathon->facebook }}" class="form-control" autofocus>
    </div>
    <div class="form-group">
      <label for="twitter" class="control-label">Twitter</label>
      <input type="text" name="twitter" value="{{ $hackathon->twitter }}" class="form-control" autofocus>
    </div>
    <div class="form-group">
      <label for="instagram" class="control-label">Instagram</label>
      <input type="text" name="instagram" value="{{ $hackathon->instagram }}" class="form-control" autofocus>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Create</button>
    </div>
  </form>
  </div>
</div>
@endsection
