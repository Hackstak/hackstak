@extends('layouts.app')
@section('title', 'Hackathons')

@section('content')
  <div class="jumbotron">
    <h1>Hackathons</h1>
    <div class="row">
    @foreach($hackathons as $h)
    <a href="{{ url('/dashboard/events/' . $h->id )}}">
      <div class="col-md-6 col-lg-6 m-b">
        <div class="statcard {{ $color_strings[array_rand($color_strings, 1)] }}">
          <div class="p-a">
            <span class="statcard-desc">{{ $h->city . ", " . $h->state }}</span>
            <h2 class="statcard-number">{{ $h->name }}</h2>
            <small class="delta-indicator">{{ date("M d, Y", strtotime($h->start_date)) }} - {{ date("M d, Y", strtotime($h->end_date)) }}</small>
          </div>
        </div>
      </div>
    </a>
    @endforeach
  </div>
  </div>
@endsection
