<h2>{{$job->title}}</h2>

<p>Your job is now posted on the website.</p>

<p>
    <a href="{{url('/jobs/' . $job->id)}}">View your job listing.</a>
</p>