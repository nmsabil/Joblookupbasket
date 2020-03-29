<?php namespace App\Http\Controllers;
use GuzzleHttp\Client as GuzzleClient;

use App\Classes\JobSearch;
use Illuminate\Http\Request;

class JobSearchController extends Controller {
    private $jobSearch;

    public function __construct(JobSearch $jobSearch) {
        $this->jobSearch = $jobSearch;

        $this->jobSearch->setJobDescription(request()->get('jobDescription'));
        $this->jobSearch->setJobLocation(request()->get('location'));
        $this->jobSearch->setSearchType('feed');
        $this->jobSearch->setJobPage(request()->get('page'));
    }

    public function getJobs() {

        $jobs = $this->jobSearch->getJobs();

        $page = request()->get('page');
        if($page == null or $page == 1) {
            $nextPage = 2;
            $prevPage = 0;
        } else {
            $nextPage = $page + 1;
            $prevPage = $page - 1;
        }

        return view('jobs', ['jobs' => $jobs, 'prevPage' => $prevPage, 'nextPage' => $nextPage]);
    }
}
