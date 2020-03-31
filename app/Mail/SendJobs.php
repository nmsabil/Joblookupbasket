<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendJobs extends Mailable {
    use Queueable, SerializesModels;

    public $user;
    public $jobs;

    public function __construct($user, $jobs) {
        $this->user = $user;
        $this->jobs = $jobs;
    }

    public function build() {
        return $this->from('jobs@joblookupbasket.com')->view('send_jobs_email');
    }
}
