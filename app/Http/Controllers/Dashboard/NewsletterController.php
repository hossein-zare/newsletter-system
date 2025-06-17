<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\StartNewsletterCampaignJob;
use Illuminate\Http\RedirectResponse;

class NewsletterController extends Controller
{
    /**
     * Show the newsletter page.
     */
    public function index()
    {
        return view('pages.dashboard.newsletter');
    }

    /**
     * Trigger the start of a newsletter campaign.
     *
     * @return RedirectResponse
     */
    public function start(): RedirectResponse
    {
        StartNewsletterCampaignJob::dispatch();

        return back()->with('success', __('Campaign started successfully.'));
    }
}
