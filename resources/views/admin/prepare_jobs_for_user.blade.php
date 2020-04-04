@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h3> {{ $user->job_description}} <h3>
            <h3> {{ $user->job_location }} </h3>
            <p> <b> Send email: </b> {{ $sendEmail ? 'Yes' : 'NO'}} <br> <b>Last Sent:</b> {{ $user->last_email_sent}}</p>
        </div>

        <div class="col-md-2">
            <p>Now: {{ now() }}</p>
        </div>
    </div>

    <div class="row">
        <table id="jobs" class="table">
            <form method="POST" action="{{ route('admin.send.jobs.email', $user->id) }}">
                <thead>
                    <tr> <td> Title </td> <td> Location </td> <td> Description </td> <td> Fetch Date </td></th>
                </thead>

                @foreach($jobs as $job)
                <tr>
                    <td>
                        <label for="job_title_{{$job->id}}">
                        <input id="job_title_{{$job->id}}" type="checkbox" name="jobIdsToSend[]" value="{{$job->id}}">
                        {{ $job->title }}
                        </label>
                    </td>

                    <td> {{ $job->location }}  </td>

                    <td> {{strip_tags($job->snippet)}} </td>

                    <td> {{$job->created_at}} </td>
                </tr>

                @endforeach
                {{ csrf_field() }}
                <button type="submit">Send </button>
            </form>
        </table>
    </div>

    <script>
        $(document).ready( function () {
            $('#jobs').DataTable({
                "pageLength" 100
            });
        } );
    </script>
@endsection
