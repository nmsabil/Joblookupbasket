
<img src="/img/joblookupbasket.com"/>

<p>Hey {{ $user->name }}, check out the jobs we've selected for you. </p>
@foreach($jobs as $job)
    @php
        $job = json_decode($job);
    @endphp

    <p><a href="{{ $job->url}}"> {{$job->title}} </a></p>
    <p>{{$job->salary</p>
@endforeach
