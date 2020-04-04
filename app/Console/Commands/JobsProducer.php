<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\JobsFetchConsumer;
use App\Subscriber;

class JobsProducer extends Command {
    protected $signature = 'JobsFetch';

    protected $description = 'Command description';

    public function __construct() {
        parent::__construct();
    }

    public function handle() {
        $subscribers = Subscriber::getEligibleSubscribers(false);

        foreach($subscribers as $subscriber) {
            JobsFetchConsumer::dispatch($subscriber);
        }
    }
}
