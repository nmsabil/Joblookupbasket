<p> Description: {{ $user->job_description}} Location: {{ $user->job_location }} </p>
{{-- <p> Subscribed? {{ $user->subscribed == 1 ? 'Yes' : 'Yes' }} </p>
<p> Activated? {{ $user->email_verification_token == '' ? 'Yes' : 'No' }} </p> --}}

<p>Send email: {{ $sendEmail ? 'Yes' : 'NO'}}</p>

<hr>

<table>
    <form method="POST" action="{{ route('admin.send.jobs.email', $user->id) }}">
        <thead>
            <tr> <td> Title </td> <td> Location </td> <td> Description </td> </th>
        </thead>

        @foreach($jobs as $jobKey => $job)
        <tr> 
            <td> 
            <input id="job_title#{{$jobKey}}" type="checkbox" name="jobsToSend[]" value="<?php echo htmlspecialchars(json_encode($job)) ?>">
                <label for="job_title#{{$jobKey}}"> {{ $job->title }} </label>
                </td> 

            <td> {{ $job->location }}  </td> 

            <td> {{strip_tags($job->snippet)}} </td>
        </tr>

        @endforeach
        {{ csrf_field() }}
        <button type="submit">Send </button>
    </form>
</table>

<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
