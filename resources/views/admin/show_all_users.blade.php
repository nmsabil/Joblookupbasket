<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Show All Users</title>
  </head>
  <body>
    <div class="container mt-5 mx-auto">
    <div class="alert alert-primary" role="alert">
        <h1 class="text-center w-100">Joblookupbasket | All Users </h1>
    </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover" id="myTable">
                    <thead >
                        <td>Name</td>
                        <td>Email</td>
                        <td>Subscribed</td>
                        <td>Last Sent</td>
                        <td>Send Jobs</td>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr >
                            <td>  {{ $user->name }} </td>
                            <td>   {{ $user->email }}</td>
                            <td class="text-center">    {{ $user->subscribed }}</td>
                            <td>     {{ $user->last_email_sent }}</td>
                            <td>     <a class="btn btn-outline-primary h-50" href="{{ route('prepare.jobs.for.user', $user->id ) }}">Send job >></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



