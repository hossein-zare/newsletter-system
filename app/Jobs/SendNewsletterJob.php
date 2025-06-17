<?php

namespace App\Jobs;

use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendNewsletterJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Subscriber $subscriber)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('Sending newsletter to '. $this->subscriber->email);
    }
}
