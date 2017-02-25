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
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Finances Brother</h3>
  </div>
  <div class="row">
    <div class="col-md-6">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Bats</td>
          <td>1000</td>
        </tr>
        <tr>
          <td>Thunderhead</td>
          <td>200</td>
        </tr>
        <tr>
          <td>Mobile Development Club</td>
          <td>100</td>
        </tr>
      </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Amazon Dots</td>
          <td>-500</td>
        </tr>
        <tr>
          <td>Jimmy Johns</td>
          <td>-300</td>
        </tr>
        <tr>
          <td>Goodcents</td>
          <td>-280</td>
        </tr>
      </tbody>
      </table>
    </div>
  </div>
@endsection
