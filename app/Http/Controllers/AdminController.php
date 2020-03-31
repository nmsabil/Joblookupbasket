<?php namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Support\Facades\Auth;
use App\Classes\JobSearch;

use Illuminate\Http\Request;

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
            return redirect()->intended('admin/show-all-users');
        }
    }

    public function showAllUsersView($searchType) {
        if($searchType == 'all') {
            $users = Subscriber::all();
        }

        if($searchType == 'eligible') {
            $users = Subscriber::where('subscribed', 1)->where('email_verification_token', '')->whereDate('last_email_sent', '<', now()->today());
        }

        return view('admin.show_all_users', ['users' => $users]);
    }

    public function prepareJobsForUserView($userId) {
        $user = Subscriber::find($userId);
        $this->jobSearch->setJobDescription($user->job_description);
        $this->jobSearch->setJobLocation($user->job_location);
        $this->jobSearch->setUniqueId($user->email);

        $jobs = $this->jobSearch->getJobs();

        return view('admin.prepare_jobs_for_user', ['jobs' => $jobs, 'user' => $user]);
    }

    public function sendJobsEmail() {
        $jobs = json_decode(request()->input('jobsToSend'));
// send email

    }
}
