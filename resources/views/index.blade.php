@extends('layouts.app')
@section('title', 'Home')

@section('head')
<link href="{{ URL::asset('css/index.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')


<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>Navbar example</h1>
  <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
  <p>
    <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs »</a>
  </p>
</div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>



@endsection


@section('footer')
<script>
$(document).ready(function(){
      $('.parallax').parallax();
    });

</script>
@endsection
