
@foreach($users as $user)
    {{ $user->name }}

    {{ $user->email }}

    {{ $user->subscribed }}

    {{ $user->last_email_sent }}

    <a href="{{ route('prepare.jobs.for.user', $user->id ) }}">Send job >></a>

@endforeach
