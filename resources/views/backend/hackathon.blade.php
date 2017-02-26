@extends('layouts.dashboard')
<?php $var = $hackathon->name; ?>

@section('title', $var)

@section('head')
<link href="{{ URL::asset('css/hackathon.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-9 content">
  <div class="row">
<div class="col-md-10 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Hackathon</h6>
      <h2 class="dashhead-title">{{ $hackathon->name }}</h2>
    </div>
    @include('subviews/messages')
  </div>

</div>
<div class ="col-md-2  content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">  Social Media</h6>
        <a href="https://www.facebook.com/kyle.eisenbarger" class="icon icon-facebook"></a>
				<a href="https://www.instagram.com/kyle24_7/" class="icon icon-instagram"></a>
        <a href="https://twitter.com/the_real__kyle" class="icon icon-twitter"></a>
    </div>
  </div>
</div>
</row>
</div>
<div class="hr-divider m-t-md m-b">
  <h3 class="hr-divider-content hr-divider-heading">Details</h3>
</div>

<div class="container">
<div class="row">
  <div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-3">
    <button type="button" class="btn btn-primary btn-lg col-md-5" display="block" >Sign Up</button>
</div>
  </div>
  <div class="row">
    <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-0">
      <h3><span class="label label-info">
        <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->registration_begin)) }}</small>
      </span>Registration Opens</h3>
    </div>

     <div class="col-sm-5 col-md-4 col-md-offset-0">
       <h3><span class="label label-success">
         <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->start_date)) }}</small>
</span>Start Time</h3>
     </div>
     <div class="col-sm-5 col-sm-offset-2 col-md-2 col-md-offset-0">
       <h3><span class="label label-danger">
         <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->end_date)) }}</small>
       </span>End Time</h3>
     </div>


  </div>

</div>



@endsection
