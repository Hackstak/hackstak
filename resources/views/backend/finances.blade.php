@extends('layouts.dashboard')
@section('title', 'Finances')

@section('content')
<div class="col-sm-9 content">
  <div class="dashhead">
    <div class="dashhead-titles">
      <h6 class="dashhead-subtitle">Dashboards</h6>
      <h2 class="dashhead-title">Finances</h2>
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
        <form id="new-entry-form" method="POST" action="{{ url('/dashboard/finances/'.$hackathon->id) }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body">
            <div class="row">
              <input type="text" name="name" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-1" placeholder="Name">
              <input type="text" name="amount" class="form-control col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-2" placeholder="Amount">
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
    <h3 class="hr-divider-content hr-divider-heading">Finances</h3>
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      <h1 id="balance-title">0</h1>
    </div>
  </div>
  <div class="row">
    <button type="button" class="btn btn-lg btn-default col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3" data-toggle="modal" data-target="#entryModal">Add Entry</button>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-striped" id="credits-table">
      <thead>
        <tr>
          <th>Name</th>
          <th class="text-right">Amount</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($credits as $c)
        <tr>
          <td>{{ $c->name }}</td>
          <td class="text-right">{{ $c->amount }}</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-striped" id="debits-table">
      <thead>
        <tr>
          <th>Name</th>
          <th class="text-right">Amount</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($debits as $d)
        <tr>
          <td>{{ $d->name }}</td>
          <td class="text-right">{{ $d->amount }}</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript" src="/js/dashboard/finances.js"></script>
@endsection
