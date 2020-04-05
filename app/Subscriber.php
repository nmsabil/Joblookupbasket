<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {
    protected $table = 'subscribers';

    protected $fillable = [
        'job_description',
        'job_location',
        'name',
        'email',
        'email_verification_token',
        'direct_login_token',
        'last_email_sent',
        'subscribed',
        'unsubscription_token'
    ];

    public function fetchedJobs() {
        return $this->hasMany('App\FetchedJob');
    }

    public static function getEligibleSubscribers($checkLastEmailSent = false) {
        $query = self::where('subscribed', 1)->where('email_verification_token', '');

        if($checkLastEmailSent == true) {
            $query->whereDate('last_email_sent', '<', today());
        }

        return $query->get();
    }

    public function getIsSubscriberEligibleAttribute() {
        return $this->subscribed == 1 and $this->email_verification_token == '' and $this->last_email_sent < today();
    }
}
