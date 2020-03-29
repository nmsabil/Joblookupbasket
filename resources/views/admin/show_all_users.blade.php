
@foreach($users as $user)
    {{ $user->name }}

    {{ $user->email }}

    {{ $user->subscribed }}

    {{ $user->last_email_sent }}

    <a href="">Send job >></a>

@endforeach
