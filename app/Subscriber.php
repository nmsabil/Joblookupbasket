<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {
    protected $fillable = ['job_description', 'job_location', 'name', 'email', 'email_verification_token', 'last_email_sent'];
}
