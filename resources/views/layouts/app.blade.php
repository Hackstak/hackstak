<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hackstak | @yield('title')</title>
    @yield('head')
    <link href="{{ URL::asset('css/toolkit-inverse.min.css') }}" rel="stylesheet" type="text/css">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url( '/' ) }}">Hackstak</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li @if(Request::is('/'))class="active"@endif><a href="{{ url('/') }}">Home</a></li>
            <li @if(Request::is('about'))class="active"@endif><a href="{{ url('/about') }}">About</a></li>
            <li @if(Request::is('hackathons'))class="active"@endif><a href="{{ url('/hackathons') }}">Hackathons</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
              <li @if(Request::is('dashboard'))class="active"@endif><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li><a href="{{ url( '/logout' ) }}">Logout</a></li>
            @else
              <li @if(Request::is('login'))class="active"@endif><a href="{{ url('/login') }}">Login</a></li>
              <li @if(Request::is('register'))class="active"@endif><a href="{{ url('/register') }}">Register</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
</body>
</html>
