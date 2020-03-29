@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            @if(request()->input('email'))
                <p> Your email {{ request()->input('email') }} has now been subscribed. Please go ahead and confirm the email so we know its you! </p>
            @endif
        </div>
    </div>
@endsection
