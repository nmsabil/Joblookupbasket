@extends('landing_page_layout')
    @section('content')
        <div class="row">
            <div class="container-fluid mx-auto">
                <header class="rounded">
                    <img
                        src="img/joblookupbasket.png"
                        alt="joblookupbasket"
                        class="logo pt-2"
                    />
                    <p class="text-dark mb-0">
                        Enter your name
                    </p>
                </header>

                <div class="card text-dark mx-auto" style="width: 85%;">
                <div class="progress mt-4">
                                 <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">2/3</div>
                            </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="/subscribe-name">
                        <div class="form-group">
                            <input
                            name="name" value="{{ session()->get('name') }}"
                            type="name"
                            class="form-control"
                            id="name"
                            placeholder="Enter you name"
                            required
                            />
                            {{ session()->get('nameError') }}
                            {{ csrf_field() }}
                        </div>

                        <button type="submit" value="Next" class="text-light w-100 rounded-pill">
                            Next
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection