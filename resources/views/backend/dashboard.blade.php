@extends('layouts.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Overview</h2>
    </div>
    @include('subviews/messages')
  </div>
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Your Hackathons</h3>
  </div>
  <div class="row statcards">

    @foreach($hackathons as $h)
    <a href="{{ url('/dashboard/events/' . $h->id )}}">
      <div class="col-md-6 col-lg-6 m-b">
      <div class="statcard {{ $color_strings[array_rand($color_strings, 1)] }}">
        <div class="p-a">
          <span class="statcard-desc">{{ $h->city . ", " . $h->state }}</span>
          <h2 class="statcard-number">{{ $h->name }}</h2>
        </div>
      </div>
    </div>
  </a>
    @endforeach

  </div>
@endsection
