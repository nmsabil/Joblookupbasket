
@extends('landing_page_layout')
    @section('content')
        <div class="row">
            <div class="container-fluid mx-auto">
            <header class="rounded">
                <img
                src="img/joblookupbasket.png"
                alt="Joblookuplogo"
                class="logo pt-2"
                />
                <p class="text-dark mb-0">
                Enter your email.
                </p>
            </header>

            <div class="card text-dark mx-auto" style="width: 85%;">
            <div class="progress mt-4">
                                 <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">3/3</div>
                            </div>
                <div class="card-body pt-0">
                <form method="POST" action="/subscribe-email">
                    <div class="form-group">
                    <input
                    name="email" value="{{ session()->get('email') }}"
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Enter you email"
                        required

                    />
                    {{ session()->get('emailError') }}
                    {{ csrf_field() }}
                    </div>


                    <button type="submit" value="Next" class="text-light w-100 rounded-pill">
                    Subscribe
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
      @endsection
