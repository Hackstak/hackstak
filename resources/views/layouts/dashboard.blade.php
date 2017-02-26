<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="Hackstak">
    <meta name="author" content="Hackstak">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="{{ URL::asset('css/toolkit-inverse.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/back.css') }}" rel="stylesheet">
    @yield('head')
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 sidebar">
          <nav class="sidebar-nav">
            <div class="sidebar-header">
              <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm"><span class="sr-only">Toggle nav</span></button>
              <a class="sidebar-brand img-responsive" href="{{ url('/') }}">Hackstak</a>
            </div>
            <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">
              <ul class="nav nav-pills nav-stacked">
                <li class="nav-header">Dashboards</li>
                <li @if(Request::is('dashboard'))class="active"@endif><a href="{{ url('/dashboard') }}">Overview</a></li>
                <li @if(Request::is('dashboard/create'))class="active"@endif><a href="{{ url('/dashboard/create') }}">Create Hackathon</a></li>
                <li class="nav-header">My Profile</li>
                @if(Auth::check())
                  @if (Auth::user()->admin == 1)
                    <li @if(Request::is('dashboard/admin'))class="active"@endif><a href="{{ url('/dashboard/admin') }}">Administration</a></li>
                  @endif
                  <li @if(Request::is('dashboard/profile'))class="active"@endif><a href="{{ url('/dashboard/profile') }}">My Profile</a></li>
                  <li><a href="{{ url('/logout') }}">Log Out</a></li>
                @else
                  <li><a href="{{ url('/login') }}">Log In</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
              </ul>
              <hr class="visible-xs m-t">
            </div>
          </nav>
        </div>
        @yield('content')
      </div>
    </div>
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/chart.js') }}"></script>
    <script src="{{ URL::asset('js/tablesorter.min.js') }}"></script>
    <script src="{{ URL::asset('js/toolkit.min.js') }}"></script>
    @yield('footer')
  </body>
</html>
