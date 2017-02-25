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

  <div class="row">
    <div class="col-md-12 text-center">
      <h1 class="text-danger">-$500</h1>
    </div>
  </div>
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Finances Brother</h3>
  </div>
  <div class="row">
    <div class="col-md-6">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th class="text-right">Amount</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Bats</td>
          <td class="text-right">1000</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        <tr>
          <td>Thunderhead</td>
          <td class="text-right">200</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        <tr>
          <td>Mobile Development Club</td>
          <td class="text-right">100</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
      </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th class="text-right">Amount</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Amazon Dots</td>
          <td class="text-right">-500</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        <tr>
          <td>Jimmy Johns</td>
          <td class="text-right">-300</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
        <tr>
          <td>Goodcents</td>
          <td class="text-right">-280</td>
          <td><span class="icon icon-edit"></span></td>
        </tr>
      </tbody>
      </table>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3"></div>
    <button type="button" class="btn btn-lg btn-default col-md-6">New Entree</button>
    <div class="col-md-3"></div>
  </div>
@endsection
