<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FetchedJob extends Model {
    protected $fillable = [
        'subscriber_id',
        'url',
        'title',
        'postcode',
        'job_type',
        'logo',
        'snippet',
        'age',
        'age_days',
        'location',
        'salary',
        'company'
    ];
}
