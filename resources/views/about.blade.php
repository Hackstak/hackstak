@extends('layouts.app')
@section('title', 'About')

@section('content')
<div class="jumbotron">
  <h1>Hackstak</h1>

<h3>Inspiration</h3>
<span>Many of the members of our group have not only participated in multiple hackathons, but have also been involved in organizing hackathons. Through our experience, we have found the organizational tools in the current landscape to be extremely lacking and are working on providing the hacking community with a beginning to end platform for planning, organizing and executing their hackathons.</span>
<h3>What it does</h3>
<span>HackStak is a beginning to end platform that event organizers and volunteers can utilize to plan their hackathons from concept to completion. Everything from hackathon theme recommendations to confirming registrations can be completed within our web application.</span>
<h3>How we built it</h3>
<span>Using the Laravel framework along with Javascript and a MySQL database, we created a web application that is hosted for event organizers to utilize and create their events.</span>
<h3>Challenges we ran into</h3>
<span>Authentication of user registration. Maintaining a well-structured and easy to understand database schema as our platform began to grow in size and features.</span>
<h3>What's next for HackStak</h3>
<span>Expanding HackStak to be able to accommodate further features and functionality to make organizing and executing hackathons even easier for event staff. This allows event staff to focus on the event itself and spend more time with the participants. After all, the most enjoyable part of any hackathon is being around so many passionate and excited hackers.</span>
</div>
</div>
@endsection
