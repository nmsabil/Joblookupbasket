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
    private $jobLimit = 25;
    private $salaryFrom = null;

    public function __construct(GuzzleClient $guzzleClient) {
        $this->guzzleClient = $guzzleClient;

        $this->publisher = 1145;
        $this->baseUri = 'https://uk.whatjobs.com/api/v1/jobs.json';
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

    public function setJobLimit($limit) {
        $this->jobLimit = $limit;
    }

    public function setSalaryFrom($from = null) {
        $this->salaryFrom = $from;
    }

    public function getJobs() {
        $uri = $this->baseUri;
        $uri .= '?keyword='. $this->jobDescription;
        $uri .= '&location='.$this->location;
        $uri .= '&publisher='. $this->publisher;
        $uri .= '&salary_from='.$this->salaryFrom;
        $uri .= '&limit='.$this->jobLimit;

        if($this->uniqueId == null) {
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
