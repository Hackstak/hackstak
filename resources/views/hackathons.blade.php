@extends('layouts.app')
@section('title', 'Hackathons')

@section('content')
  <div class="jumbotron">
    <h1>Hackathons</h1>
    <div class="row">
    @foreach($hackathons as $h)
    <div class="col-md-6 col-lg-6 m-b">
      <div class="statcard {{ $color_strings[array_rand($color_strings, 1)] }}">
        <div class="p-a">
          <span class="statcard-desc">{{ $h->city . ", " . $h->state }}</span>
          <h2 class="statcard-number">{{ $h->name }}</h2>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div>
@endsection
