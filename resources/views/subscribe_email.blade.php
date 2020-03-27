<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Subscribe</title>

        <form method="POST" action="/subscribe-email">
            Email <input name="email" value="{{ session()->get('email') }}">
            {{ session()->get('emailError') }}

            {{ csrf_field() }}
            <input type="submit" value="Next">
        </form>

    </body>
</html>
