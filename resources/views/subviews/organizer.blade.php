<div class="row">
  <ul class="nav nav-pills">
    <li @if(Request::is('dashboard/finances/*'))class="active"@endif><a href="{{ url('/dashboard/finances/'.$hackathon->id) }}">Finances</a></li>
    <li @if(Request::is('dashboard/food/*'))class="active"@endif><a href="{{ url('/dashboard/food/'.$hackathon->id) }}">Food Planner</a></li>
    <li @if(Request::is('dashboard/prize/*'))class="active"@endif><a href="{{ url('/dashboard/prize/'.$hackathon->id) }}">Prize Planner</a></li>
    <li @if(Request::is('dashboard/sponsor/*'))class="active"@endif><a href="{{ url('/dashboard/sponsor/'.$hackathon->id) }}">Sponsor Planner</a></li>
    <li @if(Request::is('dashboard/talk/*'))class="active"@endif><a href="{{ url('/dashboard/talk/'.$hackathon->id) }}">Talk Planner</a></li>
    <li @if(Request::is('dashboard/theme/*'))class="active"@endif><a href="{{ url('/dashboard/theme/'.$hackathon->id) }}">Theme Planner</a></li>
  </ul>
</div>
