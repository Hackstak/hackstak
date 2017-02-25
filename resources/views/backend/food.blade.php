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

  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Food Planner</h3>
  </div>


    <div class="col-md-12">
      <table class="table table-striped" id="debits-table">
      <thead>
        <tr>
          <th>Company Name</th>
          <th>Cost per Person</th>
          <th>Phone Number</th>
          <th class="text-center">Contacted</th>
          <th class="text-center">Confirmed</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Goodcents</td>
          <td>$3.14</td>
          <td>123-456-7890</td>
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          <td class="checkable_td_two"><span class="icon icon-check center-block text-center"></span></td>
        </tr>
        <tr>
          <td>Pizza Hut</td>
          <td>$10.02</td>
          <td>123-456-7890</td>
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          <td class="checkable_td_two"><span class="icon icon-check center-block text-center"></span></td>
        </tr>
        <tr>
          <td>Taco Hut Jr.</td>
          <td>$23.78</td>
          <td>123-456-7890</td>
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
          <td class="checkable_td_two"><span class="icon icon-check center-block text-center"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
  <script type="text/javascript" src="/js/dashboard/food.js"></script>
@endsection
