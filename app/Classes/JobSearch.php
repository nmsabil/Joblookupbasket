<?php namespace App\Classes;

use GuzzleHttp\Client as GuzzleClient;

class JobSearch {
    private $guzzleClient;
    private $jobDescription;
    private $location;
    private $publisher;
    private $salaryMin;
    private $jobSearch;
    private $uniqueId;
    private $searchType;

    public function __construct(GuzzleClient $guzzleClient) {
        $this->guzzleClient = $guzzleClient;

        $this->publisher = 1145;
        $this->baseUri = 'https://uk.whatjobs.com/api/v1/jobs.json';
        $this->snippet = 'full';
        $this->salaryMin = 1;
    }

    public function setJobDescription($description) {
        $this->jobDescription = $description;
    }

    public function setJobLocation($location) {
        $this->location = $location;
    }

    public function setJobPage($page) {
        $this->page = $page;
    }

    public function setUniqueId($id) {
        $this->uniqueId = $id;
    }

    public function getJobs() {
        $uri = $this->baseUri;
        $uri .= '?keyword='. $this->jobDescription;
        $uri .= '&location='.$this->location;
        $uri .= '&publisher='. $this->publisher;
        $uri .= '&salary_from='.$this->salaryMin;

        if($this->uniqueId == null) {
            $uri .= '&snippet='. $this->snippet;
            $uri .= '&page='. $this->page;
        } else {
            $uri .= '&unique_id='. $this->uniqueId;
        }

        $response = false;
        try {
            $response = $this->guzzleClient->request('GET', $uri);
        } catch(\Exception $e) {
            \Log::error($e);
        }

        if($response != false) {
            $response = json_decode($response->getBody()->getContents())->data;
        }

        return $response;
    }

}
