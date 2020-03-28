<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client as GuzzleClient;

use Illuminate\Http\Request;

class JobSearchController extends Controller {
    private $guzzleClient;
    private $jobDescription;
    private $location;
    private $publisher;
    
    public function __construct(GuzzleClient $guzzleClient) {
        $this->guzzleClient = $guzzleClient;
        $this->jobDescription = request()->get('description');
        $this->location = request()->get('location');
        $this->publisher = 1145;
        $this->baseUri = 'https://uk.whatjobs.com/api/v1/jobs.json';
        $this->snippet = 'full';
        $this->page = request()->get('page');
    }


    public function jobs() {
        $uri = $this->baseUri . '?keyword='. $this->jobDescription . '&location='.$this->location . '&snippet='. $this->snippet. '&publisher='. $this->publisher . '&page='. $this->page;

        $response = $this->guzzleClient->request('GET', $uri);

        $jobs = json_decode($response->getBody()->getContents())->data;

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
