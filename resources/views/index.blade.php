@extends('layouts.app')
@section('title', 'Home')

@section('head')
<link href="{{ URL::asset('css/index.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="jumbotron">
  <h1>Hackstak</h1>
  <p>An easy to use, beginning to end hackathon management platform. Created at HackISU by Alex Todd, Ashley Coleman, Dalton Hahn, and Kyle Eisenbarger.</p>
  <p>
    @if(Auth::check())
    <a class="btn btn-lg btn-primary" href="{{ url('/dashboard')}}" role="button">Go to your dashboard...</a>
    @else
    <a class="btn btn-lg btn-primary" href="{{ url('/login')}}" role="button">Log in to get started...</a>
    @endif
  </p>
</div>
</div>
@endsection
