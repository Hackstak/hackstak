@extends('layouts.dashboard')
<?php $var = $hackathon->name; ?>

@section('title', $var)

@section('head')
<link href="{{ URL::asset('css/hackathon.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-sm-9 content">
  <div class="row">
    <div class="col-xs-7 content">
      <div class="dashhead">
        <div class="dashhead-titles">
          <h6 class="dashhead-subtitle">Hackathon</h6>
          <h2 class="dashhead-title">{{ $hackathon->name }}</h2>
        </div>
        @include('subviews/messages')
      </div>
    </div>
    <div class="col-xs-5 content">
      <div class="dashhead">
        <div class="dashhead-titles social-links">
          <h6 class="dashhead-subtitle">Social Media</h6>
          @if($hackathon->facebook != null)
          <a href="{{ $hackathon->facebook }}" class="icon icon-facebook" target="_blank"></a>
          @endif
          @if($hackathon->instagram != null)
          <a href="{{ $hackathon->instagram }}" class="icon icon-instagram" target="_blank"></a>
          @endif
          @if($hackathon->twitter != null)
          <a href="{{ $hackathon->twitter }}" class="icon icon-twitter" target="_blank"></a>
          @endif
        </div>
      </div>
    </div>
  </div>
  @include('subviews/organizer')
  <div class="hr-divider m-t-md m-b">
    <h3 class="hr-divider-content hr-divider-heading">Check In</h3>
  </div>
  <div class="col-xs-12">
    <table class="table table-striped" id="debits-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Year in School</th>
        <th>Major</th>
        <th>School</th>
        <th>Dietary Restrictions</th>
        <th>Special Needs</th>
        <th>Checked In</th>
      </tr>
    </thead>
    <tbody>
      @foreach($attendance as $person)
      <tr>
        <td>{{ $person->user->first }} {{ $person->user->last }}</td>
        <td>{{ $person->user->gender }}</td>
        <td>{{ $person->user->email }}</td>
        <td>{{ $person->user->phone }}</td>
        <td>{{ $person->user->year_in_school }}</td>
        <td>{{ $person->user->major }}</td>
        <td>{{ $person->user->school }}</td>
        <td>{{ $person->user->dietary_restrictions }}</td>
        <td>{{ $person->user->special_needs }}</td>
        @if($person->checked_in)
          <td class="checkable_td_one"><span class="icon icon-check center-block text-center"></span></td>
        @else
          <td class="checkable_td_one"><a href="{{ url('/dashboard/checkin/'.$hackathon->id.'/'.$person->user->id) }}"><span class="icon icon-cross center-block text-center"></span></a></td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
