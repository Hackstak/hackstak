<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hackstak | @yield('title')</title>

    @yield('head')
    <!-- Styles -->
    <link href="{{ URL::asset('css/toolkit-inverse.min.css') }}" rel="stylesheet" type="text/css">


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>


    <div class="container">

      <!-- Static navbar -->
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
              <li class="active"><a href="{{ url( '/' ) }}">Home</a></li>
              <li><a href="{{ url( '/about' ) }}">About</a></li>
              <li><a href="{{ url( '/hackathons' ) }}">Hackathons</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url( '/login' ) }}">Login</a></li>
              <li><a href="{{ url( '/register' ) }}">Register</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


@yield('content')

    <!-- Scripts -->
</body>
</html>
