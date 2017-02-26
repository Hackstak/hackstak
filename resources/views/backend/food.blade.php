@extends('layouts.dashboard')
@section('title', 'Food Planner')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Food Planner</h2>
    </div>
    @include('subviews/messages')
  </div>

  <!-- Modal -->
  <div class="modal fade" id="entryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Entry</h4>
        </div>
        <form id="new-entry-form" method="POST" action="{{ url('/dashboard/food') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-1"></div>
              <input type="text" name="company_name" class="form-control col-md-4" placeholder="Company Name">
              <div class="col-md-2"></div>
              <input type="text" name="phone" class="form-control col-md-4" placeholder="Phone Number">
            </div>
            <br>
            <div class="row">
              <div class="col-md-1"></div>
              <input type="text" name="cost_per_person" class="form-control col-md-4" placeholder="Cost per Person">
              <div class="col-md-2"></div>
              <input type="text" name="total_estimate" class="form-control col-md-4" placeholder="Total Estimate">
            </div>
            <br>
            <div class="row">
              <div class="col-md-2"></div>
              <select class="col-md-2" name="contacted" class="form-control">
                  <option value>Contacted?</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
              </select>

              <div class="col-md-1"></div>
              <select class="col-md-2" name="will_deliver" class="form-control">
                  <option value>Will Deliver?</option>
                  <option value="1">Yes</option>
                  <option value="0">No</option>
              </select>

              <div class="col-md-1"></div>
              <select class="col-md-2" name="confirmed" class="form-control">
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
      </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3"></div>
    <button type="button" class="btn btn-lg btn-default col-md-6" data-toggle="modal" data-target="#entryModal">Add Entry</button>
    <div class="col-md-3"></div>
  </div>

  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Food Planner</h3>
  </div>


    <div class="col-md-12">
      <table class="table table-striped" id="debits-table">
      <thead>
        <tr>
          <th>Company Name</th>
          <th>Cost per Person</th>
          <th>Total Estimate</th>
          <th>Phone Number</th>
          <th class="text-center">Contacted</th>
          <th class="text-center">Will Deliver</th>
          <th class="text-center">Confirmed</th>
        </tr>
      </thead>
      <tbody>
        @foreach($foods as $f)
        <tr>
          <td>{{ $f->company }}</td>
          <td>${{ $f->cost_per_person }}</td>
          <td>${{ $f->total_estimate }}</td>
          <td>{{ $f->phone }}</td>

          @if($f->contacted == true)
          <td class="checkable_td_one"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          @endif

          @if($f->will_deliver == true)
          <td class="checkable_td_two"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_two"><span class="icon icon-check center-block text-center"></span></td>
          @endif

          @if($f->confirmed == true)
          <td class="checkable_td_three"><span class="checked icon icon-check center-block text-center"></span></td>
          @else
          <td class="checkable_td_three"><span class="icon icon-check center-block text-center"></span></td>
          @endif


        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  <script type="text/javascript" src="/js/dashboard/food.js"></script>
@endsection
