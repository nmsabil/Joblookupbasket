   @extends('admin.layout')

   @section('content')
    <div class="container mt-5 mx-auto">
    <div class="alert alert-primary" role="alert">
        <h1 class="text-center w-100">Joblookupbasket | All Users </h1>
    </div>
        <div class="row">
        <p> <a href="{{ route('show.users', 'all') }}">Show all users</a> </p> <br> <br>
        <p> <a href="{{ route('show.users', 'eligible') }}">Show elieible users</a> </p>
            <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="myTable">
                    <thead >
                        <td>Last Sent</td>
                        <td> Description </td>
                        <td> Location </td>
                        <td> Total Jobs </td>
                        <td>Send Jobs</td>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr >
                                <td> {{ $user->last_email_sent }}</td>
                                <td> {{ $user->job_description }}</td>
                                <td> {{ $user->job_location }}</td>
                                <td> {{ $user->fetchedJobs()->count()}} </td>
                                <td> <a class="btn btn-outline-primary h-50" href="{{ route('prepare.jobs.for.user', $user->id ) }}">Send</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
@endsection


