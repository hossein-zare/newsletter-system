<?php

use App\Jobs\StartNewsletterCampaignJob;

test('dispatches the StartNewsletterCampaignJob', function () {
    Bus::fake();

    StartNewsletterCampaignJob::dispatch();

    Bus::assertDispatched(StartNewsletterCampaignJob::class);
});
