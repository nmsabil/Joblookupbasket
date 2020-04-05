<?php namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Support\Facades\Auth;
use App\Classes\JobSearch;
use App\Mail\SendJobs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\FetchedJob;

class AdminController extends Controller {
    private $jobSearch;

    public function __construct(JobSearch $jobSearch) {
        $this->jobSearch = $jobSearch;
    }

    public function loginView() {
        return view('admin.login');
    }

    public function login() {
        if(Auth::attempt(['email' => request()->input('email'), 'password' => request()->input('password')])) {
            return redirect()->intended('admin/show-users/all');
        }
    }

    public function showAllUsersView($searchType) {
        if($searchType == 'all') {
            $users = Subscriber::all();
        }

        if($searchType == 'eligible') {
            $users = Subscriber::getEligibleSubscribers(true);
        }

        return view('admin.show_all_users', ['users' => $users]);
    }

    public function prepareJobsForUserView($userId) {
        $user = Subscriber::find($userId);
        // $this->jobSearch->setJobDescription($user->job_description);
        // $this->jobSearch->setJobLocation($user->job_location);
        // $this->jobSearch->setJobLimit(50);
        // $this->jobSearch->setSalaryFrom();
        // $this->jobSearch->setUniqueId($user->email);

        // $jobs = $this->jobSearch->getJobs();

        $jobs = $user->fetchedJobs;

        $sendEmail = $user->is_subscriber_eligible;

        return view('admin.prepare_jobs_for_user', ['jobs' => $jobs, 'user' => $user, 'sendEmail' => $sendEmail]);
    }

    public function sendJobsEmail($userId) {
        $jobIds = request()->input('jobIdsToSend');
        $jobs = FetchedJob::whereIn('id', $jobIds)->get();

        $user = Subscriber::find($userId);
        $user->update(['last_email_sent' => now()]);
        $user->fetchedJobs()->delete();

        Mail::to($user->email)->send(new SendJobs($user, $jobs));

        return redirect()->to('admin/show-users/eligible');
    }
}
