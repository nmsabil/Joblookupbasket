<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {
    protected $table = 'subscribers';

    protected $fillable = ['job_description', 'job_location', 'name', 'email', 'email_verification_token', 'direct_login_token', 'last_email_sent', 'subscribed'];

    public function fetchedJobs() {
        return $this->hasMany('App\FetchedJob');
    }
}
