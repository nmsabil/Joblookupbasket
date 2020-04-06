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
                        What job you're looking for? <br> <i>We will handpick those job for you.</i>
                    </p>
                    </header>
                    
                    <div class="card text-dark mx-auto" style="width: 85%;">
                    <div class="percentage text-center pb-0 mt-3">1/3</div>
                        <div class="progress ">
                            <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            
                        </div>
                        
                        <div class="card-body pt-0">
                            <form method="POST" action="/subscribe-job-description">
                                <div class="form-group">
                                <input

                                name="jobDescription" value="{{ session()->get('jobDescription') }}"
                                type="keyword"
                                class="form-control"
                                id="keyword"
                                placeholder="what job?"
                                required
                                />
                                </div>

                                <div class="form-group">
                                <input name="jobLocation" value="{{ session()->get('jobLocation') }}"

                                type="location"
                                class="form-control"
                                id="location"
                                placeholder="..and where?"

                                />
                                {{ session()->get('jobDescriptionError') }}
                                {{ csrf_field() }}
                                </div>


                                <button type="submit" class="text-light w-100 rounded-pill mt-2" value="Next"> Next </button>
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>

    @endsection
