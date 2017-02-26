@extends('layouts.dashboard')
@section('title', 'Theme Planner')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Theme Planner</h2>
    </div>
    @include('subviews/messages')
  </div>
  @include('subviews/organizer')
  <div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Entry</h4>
        </div>
        <form id="new-entry-form" method="POST" action="{{ url('/dashboard/theme/'.$hackathon->id) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body">
            <div class="row">
              <input type="text" name="name" class="form-control col-xs-10 col-xs-offset-1" placeholder="Name">
            </div>
            <div class="row">
              <select class="col-xs-10 col-xs-offset-1" name="confirmed" class="form-control">
                <option value>Confirmed?</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>

      </form>
    </div>
  </div>



  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Theme Planner</h3>
  </div>
  <div class="row">
    <button type="button" class="btn btn-lg btn-default col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3" data-toggle="modal" data-target="#entryModal">Add Entry</button>
  </div>

  <div class="col-md-12">
    <table class="table table-striped" id="debits-table">
      <thead>
        <tr>
          <th>Name</th>
          <th class="text-center">Confirmed</th>
        </tr>
      </thead>
      <tbody>
        @foreach($themes as $t)
        <tr>
          <td>{{ $t->name }}</td>
          @if($t->confirmed == true)
          <td class="checkable_td_one"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript" src="/js/dashboard/food.js"></script>
@endsection
