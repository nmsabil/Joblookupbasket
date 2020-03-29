@extends('layout')
    @section('content')
        <form method="GET" action="/">
            <input name="description"> <br>
            <input name="location">
            <input type="submit" value="Search">
        </form>

        <p><a href="subscribe-job-description"> Free - Let us handpick jobs for you! <a></p>

        @foreach($jobs as $job)
            <a onmousedown="{{$job->onmousedown}}" href="{{$job->url}}">{{$job->title}}</a> <br>
            {{ $job->location }}
            <p>{!! substr($job->snippet, 0, 200) !!}...</p>
        @endforeach

        <a href="?description={{request()->get('description')}}&location={{request()->get('location')}}&page={{$prevPage}}">
            <button {{ ($prevPage == 0 ? 'disabled' : '') }}>Prev</button>
        </a>

        <a href="?description={{request()->get('description')}}&location={{request()->get('location')}}&page={{$nextPage}}">
            <button>Next</button>
        </a>
    @endsection
