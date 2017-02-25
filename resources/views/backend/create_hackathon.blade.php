@extends('layouts.dashboard')
@section('title', 'Create Hackathon')


@section('content')
<div class="col-sm-9 content">
   <div class="dashhead">
      <div class="dashhead-titles">
         <h6 class="dashhead-subtitle">Dashboard</h6>
         <h2 class="dashhead-title">Create Hackathon</h2>
      </div>
      @include('subviews/messages')
   </div>
 <div class="hr-divider m-t-md m-b">
   <h3 class="hr-divider-content hr-divider-heading">Create Event</h3>
 </div>
  <div class="container">
    <div class="col-md-7 ">
            <form method="POST" action="{{ url('dashboard/submit') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
               {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Event Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" placeholder="Event Name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="startdate" class="col-sm-3 control-label">Start Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="startdate" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="enddate" class="col-sm-3 control-label">End Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="enddate" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" placeholder="Address" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" name="city" placeholder="eg. Manhattan" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9">
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
                          	<option value="IA">Iowa</option>
                          	<option value="KS">Kansas</option>
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
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label for="zipcode" class="col-sm-3 control-label">Zip Code</label>
                    <div class="col-sm-9">
                        <input type="text" name="zipcode" placeholder="11111" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="registration_begin" class="col-sm-3 control-label">Registration Begin</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="registration_begin" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="registration_end" class="col-sm-3 control-label">Registration End</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="registration_end" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="checkin_begin" class="col-sm-3 control-label">Check-in Begin</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="checkin_begin" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="checkin_end" class="col-sm-3 control-label">Registration End</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="checkin_end" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                    <div class="col-sm-9">
                        <input type="text" name="facebook" placeholder="eg. https://www.facebook.com/page" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                    <div class="col-sm-9">
                        <input type="text" name="twitter" placeholder="eg. https://www.twitter.com/page" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                    <div class="col-sm-9">
                        <input type="text" name="instagram" placeholder="eg. https://www.instagram.com/page" class="form-control" autofocus>
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
                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
      </div>
@endsection
