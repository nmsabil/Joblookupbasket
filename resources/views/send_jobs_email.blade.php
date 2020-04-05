
<img src="/img/joblookupbasket.png"/>

<p>Hey {{ $user->name }}, check out the jobs we've selected for you. </p>
@foreach($jobs as $job)
    @php
        $job = json_decode($job);
    @endphp

    <p><a href="{{ $job->url}}"> {{$job->title}} </a></p>
    <p>{{ strip_tags($job->snippet) }}</p>
    <p>{{$job->salary}}</p>
@endforeach


If you're no longer interested in receiving the jobs by email you can unsubscribe by clicking this link. <a href="{{ route('unsubscribe', $user->unsubscription_token) }}">unsubsceribe</a>
