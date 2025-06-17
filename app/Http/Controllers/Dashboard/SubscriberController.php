<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSubscriberRequest;
use App\Http\Requests\Dashboard\UpdateSubscriberRequest;
use App\Models\Subscriber;
use App\Services\SubscriberService;
use Illuminate\Http\RedirectResponse;

class SubscriberController extends Controller
{
    /**
     * Create a new instance.
     *
     * @param  SubscriberService  $service
     */
    public function __construct(private readonly SubscriberService $service)
    {}

    /**
     * Show the list of subscribers.
     */
    public function index()
    {
        $subscribers = $this->service->paginate();

        return view('pages.dashboard.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the creation form.
     */
    public function create()
    {
        return view('pages.dashboard.subscribers.create');
    }

    /**
     * Store a subscriber.
     *
     * @param  StoreSubscriberRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreSubscriberRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->safe()->all()
        );

        return to_route('dashboard.subscribers.index')
            ->with('success', 'Subscriber created successfully.');
    }

    /**
     * Show the edit form.
     */
    public function edit(Subscriber $subscriber)
    {
        return view('pages.dashboard.subscribers.edit', compact('subscriber'));
    }

    /**
     * Update the subscriber.
     *
     * @param  UpdateSubscriberRequest  $request
     * @param  Subscriber  $subscriber
     * @return RedirectResponse
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber): RedirectResponse
    {
        $this->service->update($subscriber, $request->safe()->all());

        return to_route('dashboard.subscribers.index')
            ->with('success', __('Subscriber updated successfully.'));
    }

    /**
     * Delete the subscriber.
     *
     * @param  Subscriber  $subscriber
     * @return RedirectResponse
     */
    public function destroy(Subscriber $subscriber): RedirectResponse
    {
        $this->service->delete($subscriber);

        return back()->with('success', __('Subscriber deleted successfully.'));
    }
}
