<?php namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Classes\JobSearch;
use App\FetchedJob;

class JobsFetchConsumer implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscribers;

    public function __construct($subscriber) {
        $this->subscriber = $subscriber;
    }

    public function handle(JobSearch $jobSearch) {
        // if jobs are already fetched before today delete the. updated_at < today. delete them. from fetched_jobs
        // cuz we wanna fetch fresh jobs.. we not gonna send jobs fetched day before.. we could have fetched jobs yesterday
        // but didn't send.. so today we wanna make sure we get rid of it.

        if($this->subscriber->fetchedJobs()->count() > 0) {
            $existingJobs = $this->subscriber->fetchedJobs;

            // Removing old jobs..
            foreach($existingJobs as $job) {
                if($job->updated_at < today()) {
                    FetchedJob::where('id', $job->id)->delete($job);
                }
            }
        } else {
            $this->jobSearch->setJobDescription($this->subscriber->job_description);
            $this->jobSearch->setJobLocation($this->subscriber->job_location);
            $this->jobSearch->setJobLimit(50);
            $this->jobSearch->setUniqueId($this->subscriber->email);

            $jobs = $this->jobSearch->getJobs();

            if(count($jobs) > 0) {
                // Store jobs in DB
            }

            // Set updated_at to today

            // Means we have fetched all jobs for this use we possibly could.
            return false;
        }
    }
}
