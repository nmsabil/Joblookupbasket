<p> Description: {{ $user->job_description}} </p>
<p> Location: {{ $user->job_location }} </p>
<p> Subscribed? {{ $user->subscribed == 1 ? 'Yes' : 'Yes' }} </p>
<p> Activated? {{ $user->email_verification_token == '' ? 'Yes' : 'No' }} </p>
