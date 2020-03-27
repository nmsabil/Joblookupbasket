<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Subscribe</title>

        <form method="POST" action="/subscribe-job-description">
            What job are you looking for? <input name="jobDescription" value="{{ session()->get('jobDescription') }}"> <br>
            ..and where? <input name="jobLocation" value="{{ session()->get('jobLocation') }}">
            {{ session()->get('jobDescriptionError') }}

            {{ csrf_field() }}
            <input type="submit" value="Next">
        </form>

    </body>
</html>
