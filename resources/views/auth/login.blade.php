@extends('layouts.app')
@section('title', 'Login')

@section('head')
<link href="{{ URL::asset('css/registration.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div class="container">
            <form method="POST" action="{{ url('Auth/register') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
               {{ csrf_field() }}
                <h2>Login</h2>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="username" placeholder="Username" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
@endsection
