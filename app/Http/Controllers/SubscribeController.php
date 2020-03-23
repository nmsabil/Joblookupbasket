<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscribeController extends Controller {

    private $nameInput;
    private $nameSession;

    private $emailInput;
    private $emailSession;

    private $jobDescriptionInput;
    private $jobDescriptionSession;


    public function __construct() {
        $this->nameInput = request()->input('name');
        $this->nameSession = session()->get('name');

        $this->emailInput = request()->input('email');
        $this->emailSession = session()->get('email');

        $this->jobDescriptionInput = request()->input('jobDescription');
        $this->jobDescriptionSession = session()->get('jobDescription');
    }

    public function subscribeNameView() {
        return view('subscribe_name');
    }


    public function subscribeEmailView() {
        if(session()->get('name') == null) {
            return redirect()->to('subscribe-name');
        }

        return view('subscribe_email');
    }

    public function subscribeJobDescriptionView() {
        if(session()->get('name') == null) {
            return redirect()->to('subscribe-name');
        }

        if(session()->get('email') == null) {
            return redirect()->to('subscribe-email');
        }

        return view('subscribe_job_description');
    }

    public function subscribeName() {
        session()->forget('name');

        if(strlen($this->nameInput) == 0) {
            return back()->with('nameError', 'Name please');
        } else {
            session(['name' => $this->nameInput]);
            return redirect()->to('subscribe-email');
        }
    }

    public function subscribeEmail() {
        session()->forget('email');

        $emailFromDb = 'email';

        if (!filter_var($this->emailInput, FILTER_VALIDATE_EMAIL)) {
            return back()->with('emailError', 'Invalid email');
        }
        
        if(!$emailFromDb) {
            return back()->with('emailError', 'Email already used');
        }

        session(['email' => $this->emailInput]);

        return redirect()->to('subscribe-job-description');
    }

    public function subscribeJobDescription() {
        session()->forget('jobDescription');

        if(strlen($this->jobDescriptionInput) == 0) {
            return back()->with('jobDescriptionError', 'So, What job are you looking for?');
        } else {
            session(['jobDescription' => $this->jobDescriptionInput]);

            if($this->nameSession = null) {
                return redirect()->to('subscribe-name');
            }

            if($this->emailSession = null) {
                return redirect()->to('subscribe-email');
            }

            if($this->jobDescriptionSession = null) {
                return redirect()->to('subscribe-job-description');
            }

            // Store in the database..

            return redirect()->to('subscribe-email');
        }
    }

}
