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

    protected $subscriber;

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
                if($job->created_at < today()) {
                    FetchedJob::where('id', $job->id)->delete($job);
                }
            }
        }

        $jobSearch->setJobDescription($this->subscriber->job_description);
        $jobSearch->setJobLocation($this->subscriber->job_location);
        $jobSearch->setJobLimit(50);
        $jobSearch->setUniqueId($this->subscriber->email);

        $jobs = $jobSearch->getJobs();

        if(count($jobs) > 0) {
            foreach($jobs as $job) {
                $job = json_decode(json_encode($job), true);
                $job['subscriber_id'] = $this->subscriber->id;
                FetchedJob::create($job);
            }
        }

        // Means we have fetched all jobs for this use we possibly could.
        return false;
    }
}
