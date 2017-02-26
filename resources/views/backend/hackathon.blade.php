@extends('layouts.dashboard')
<?php $var = $hackathon->name; ?>

@section('title', $var)

@section('head')
<link href="{{ URL::asset('css/hackathon.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-sm-9 content">
  <div class="row">
    <div class="col-xs-7 content">
      <div class="dashhead">
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Hackathon</h6>
          <h2 class="dashhead-title">{{ $hackathon->name }}</h2>
        </div>
        @include('subviews/messages')
      </div>
    </div>
    <div class="col-xs-5 content">
      <div class="dashhead">
        <div class="dashhead-titles social-links">
          <h6 class="dashhead-subtitle">Social Media</h6>
          @if($hackathon->facebook != null)
          <a href="{{ $hackathon->facebook }}" class="icon icon-facebook" target="_blank"></a>
          @endif
          @if($hackathon->instagram != null)
          <a href="{{ $hackathon->instagram }}" class="icon icon-instagram" target="_blank"></a>
          @endif
          @if($hackathon->twitter != null)
          <a href="{{ $hackathon->twitter }}" class="icon icon-twitter" target="_blank"></a>
          @endif
        </div>
      </div>
    </div>
  </div>
  @if($organizer == 1)
    @include('subviews/organizer')
  @endif
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Details</h3>
  </div>
  <div class="col-xs-12">
    <h2 class="center">{{ $hackathon->city }}, {{ $hackathon->state }}</h2>
    <div class="row hackathon-info">
      <div class="col-xs-4">
        <h3 class="center">Registration</h3>
        <h3 class="center">
          <span class="label label-info">
            <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->registration_begin)) }}</small>
          </span>
        </h3>
      </div>
      <div class="col-xs-4">
        <h3 class="center">First Day</h3>
        <h3 class="center">
          <span class="label label-success">
            <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->start_date)) }}</small>
          </span>
        </h3>
      </div>
      <div class="col-xs-4">
        <h3 class="center">Last Day</h3>
        <h3 class="center">
          <span class="label label-danger">
            <small class="delta-indicator">{{ date("M d, Y", strtotime($hackathon->end_date)) }}</small>
          </span>
        </h3>
      </div>
    </div>

    @if($organizer == 0)
    <div class="row">
      <a href="{{ url('/dashboard/events/register/' . $hackathon->id )}}"><button type="button" class="btn btn-lg btn-default col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3">Sign Up</button></a>
    </div>
    @elseif($organizer == 1)
    <div class="row">
      <a href="{{ url('/dashboard/events/edit/' . $hackathon->id )}}"><button type="button" class="btn btn-lg btn-default col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3">Edit Hackathon</button></a>
    </div>
    @elseif($organizer == 2)
    <div class="row center">
      You're registered for this hackathon!
    </div>
    @endif
    <br>
  </div>

<div class="row">
<div class="container map">

 <div id="map"></div>
</div>
</div>
@endsection
@section('footer')
<script>
      function initMap() {
        var uluru = {lat: {{ $lat }}, lng: {{ $long }}};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRv6XoNNgi5ftgGLqgJGIBSscUfGHJpGU&libraries=places&callback=initMap" async defer></script></script>
@endsection
