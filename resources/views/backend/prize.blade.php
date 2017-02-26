@extends('layouts.dashboard')
@section('title', 'Prize Planner')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Prize Planner</h2>
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
        <form id="new-entry-form" method="POST" action="{{ url('/dashboard/prize/'.$hackathon->id) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body">
            <div class="row">
              <input type="text" name="name" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1" placeholder="Name">
              <input type="text" name="link" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-2" placeholder="Purchase Link">
            </div>
            <br>
            <div class="row">
              <input type="text" name="cost_per_item" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1" placeholder="Cost Per Item">
              <input type="text" name="total_per_team" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-2" placeholder="Total Per Team">
            </div>
            <br>
            <div class="row">
              <select class="col-xs-4 col-xs-offset-1" name="purchased" class="form-control">
                  <option value>Purchased?</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
              </select>
              <select class="col-xs-4 col-xs-offset-2" name="delivered" class="form-control">
                  <option value>Delivered?</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
      </div>
    </div>
  </div>

  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Prize Planner</h3>
  </div>
  <div class="row">
    <button type="button" class="btn btn-lg btn-default col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3" data-toggle="modal" data-target="#entryModal">Add Entry</button>
  </div>

    <div class="col-md-12">
      <table class="table table-striped" id="debits-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Cost per Item</th>
          <th>Total Per Team</th>
          <th>Purchase Link</th>
          <th class="text-center">Purchased</th>
          <th class="text-center">Delivered</th>
        </tr>
      </thead>
      <tbody>
        @foreach($prizes as $p)
        <tr>
          <td>{{ $p->name }}</td>
          <td>${{ $p->cost_per_item }}</td>
          <td>${{ $p->total_per_team }}</td>
          <td><a href="{{ $p->link }}">{{ $p->link }}</a></td>

          @if($p->purchased == true)
          <td class="checkable_td_one"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          @endif

          @if($p->delivered == true)
          <td class="checkable_td_two"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_two"><span class="icon icon-check center-block text-center"></span></td>
          @endif


        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript" src="/js/dashboard/food.js"></script>
@endsection
