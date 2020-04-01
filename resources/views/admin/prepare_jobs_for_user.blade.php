<p> Description: {{ $user->job_description}} </p>
<p> Location: {{ $user->job_location }} </p>
<p> Subscribed? {{ $user->subscribed == 1 ? 'Yes' : 'Yes' }} </p>
<p> Activated? {{ $user->email_verification_token == '' ? 'Yes' : 'No' }} </p>


<form method="POST" action="{{ route('admin.send.jobs.email', $user->id) }}">
    @foreach($jobs as $job)
        <div class="box">
            <input id="job_title" type="checkbox" name="jobsToSend[]" value="<?php echo htmlspecialchars(json_encode($job)) ?>">
            <label for="job_title"> {{ $job->title }} </span>

            <p> {{ $job->location }} </p>
            <p>{{$job->snippet}}</p>
        </div>
    @endforeach
    {{ csrf_field() }}
    <button type="submit">Send </button>
</form>

<style>
    .box {
        padding:10px;
        border-bottom:1px solid black;
    }
</style>

<script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
        ></script>
