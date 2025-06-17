<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Services\SubscriberService;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Show the home page.
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Subscribe to the newsletter.
     *
     * @param  SubscribeRequest  $request
     * @param  SubscriberService  $subscriberService
     * @return RedirectResponse
     */
    public function subscribe(SubscribeRequest $request, SubscriberService $subscriberService): RedirectResponse
    {
        $subscriberService->create(
            $request->safe()->all()
        );

        return back()->with('success', __('You have been subscribed!'));
    }
}
