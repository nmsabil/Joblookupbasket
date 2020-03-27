<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $jobseekerName;
    public $verificationToken;

    public function __construct($jobseekerName, $verificationToken) {
        $this->jobseekerName = $jobseekerName;
        $this->verificationToken = $verificationToken;
    }

    public function build() {
        return $this->from('jobs@joblookupbasket.com')->view('view.name');
    }
}
