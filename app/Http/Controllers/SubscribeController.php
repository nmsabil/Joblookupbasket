<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Mail\SendEmailVerification;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller {

    private $nameInput;
    private $nameSession;

    private $emailInput;
    private $emailSession;

    private $jobDescriptionInput;
    private $jobDescriptionSession;

    private $jobLocationInput;
    private $jobLocationSession;

    public function __construct() {
        $this->nameInput = request()->input('name');
        $this->nameSession = session()->get('name');

        $this->emailInput = request()->input('email');
        $this->emailSession = session()->get('email');

        $this->jobDescriptionInput = request()->input('jobDescription');
        $this->jobDescriptionSession = session()->get('jobDescription');

        $this->jobLocationInput = request()->input('jobLocation');
        $this->jobLocationSession = session()->get('jobLocation');
    }


    public function subscribeJobDescriptionView() {
        return view('subscribe_job_description');
    }

    public function subscribeNameView() {
        if(session()->get('jobDescription') == null) {
            return redirect()->to('subscribe-job-description');
        }

        return view('subscribe_name');
    }

    public function subscribeEmailView() {
        if(session()->get('jobDescription') == null) {
            return redirect()->to('subscribe-job-description');
        }

        if(session()->get('name') == null) {
            return redirect()->to('subscribe-name');
        }

        return view('subscribe_email');
    }

    public function subscribeJobDescription() {
        session()->forget('jobDescription');

        if(strlen($this->jobDescriptionInput) == 0) {
            return back()->with('jobDescriptionError', 'We need to know what job you are looking for');
        } else {
            session(['jobDescription' => $this->jobDescriptionInput]);
            session(['jobLocation' => $this->jobLocationInput]);

            return redirect()->to('subscribe-name');
        }
    }

    public function subscribeName() {
        session()->forget('name');

        if(strlen($this->nameInput) == 0) {
            return back()->with('nameError', 'Name please');
        } else {
            session(['name' => $this->nameInput]);

            if($this->jobDescriptionSession = null) {
                return redirect()->to('subscribe-job-description');
            }

            if($this->emailSession = null) {
                return redirect()->to('subscribe-email');
            }

            if($this->nameSession = null) {
                return redirect()->to('subscribe-name');
            }

            return redirect()->to('subscribe-email');
        }
    }

    public function subscribeEmail() {
        session()->forget('email');

        if (!filter_var($this->emailInput, FILTER_VALIDATE_EMAIL)) {
            return back()->with('emailError', 'Invalid email');
        }

        $emailFromDb = Subscriber::where('email', $this->emailInput)->first();
        if($emailFromDb != null) {
            return back()->with('emailError', 'Email already used');
        }

        session(['email' => $this->emailInput]);

        if(session()->get('name') and session()->get('email') and session()->get('jobDescription')) {

            $verificationToken = \Str::random(50);

            Subscriber::create([
                'job_description' => session()->get('jobDescription'),
                'job_location' => session()->get('jobLocation'),
                'email' => session()->get('email'),
                'name' => session()->get('name'),
                'email_verification_token' => $verificationToken,
                'last_email_sent' => now()->subDay(1)->toDateTimeString()
            ]);

            session()->forget('jobDescription');
            session()->forget('jobLocation');
            session()->forget('email');
            session()->forget('name');

            Mail::to(session()->get('email'))->send(new SendEmailVerification(session()->get('name'), $verificationToken));

            // Send email confirmation

            return redirect()->to('/subscribed');
        } else {
            \Log::info(session()->all());
            abort(404);
        }
    }

    public function verifyEmail() {
        $token = request()->get('token');
        $foundToken = Subscriber::where('verification_token', $token)->first();
        if($foundToken) {
            // verify email
        } else {
            // token doesnt exist..
        }
    }

    public function subscribedView() {
        return view('subscribed');
    }
}
