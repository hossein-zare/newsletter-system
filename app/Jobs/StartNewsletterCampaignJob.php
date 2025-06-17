<?php

namespace App\Jobs;

use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Queue\Queueable;

class StartNewsletterCampaignJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->delay(
            now()->addMinutes(2)
        );
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Subscriber::active()->chunk(50, function (Collection $subscribers) {
            $subscribers->each(fn (Subscriber $subscriber) => SendNewsletterJob::dispatch($subscriber));
        });
    }
}
