@foreach($jobs as $job)
    @php 
        $job = json_decode($job);
    @endphp

    <p><a href="{{ $job->url}}"> {{$job->title}} </a></p>
@endforeach