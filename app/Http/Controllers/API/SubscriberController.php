<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSubscriberRequest;
use App\Http\Requests\Dashboard\UpdateSubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use App\Services\SubscriberService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
        return SubscriberResource::collection($this->service->paginate());
    }

    /**
     * Show the subscriber.
     *
     * @param  Subscriber  $subscriber
     * @return SubscriberResource
     */
    public function show(Subscriber $subscriber): SubscriberResource
    {
        return new SubscriberResource($subscriber);
    }

    /**
     * Store a subscriber.
     *
     * @param  StoreSubscriberRequest  $request
     * @return JsonResponse
     */
    public function store(StoreSubscriberRequest $request): JsonResponse
    {
        $subscriber = $this->service->create(
            $request->safe()->all()
        );

        return (new SubscriberResource($subscriber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update the subscriber.
     *
     * @param  UpdateSubscriberRequest  $request
     * @param  Subscriber  $subscriber
     * @return SubscriberResource
     */
    public function update(UpdateSubscriberRequest $request, Subscriber $subscriber): SubscriberResource
    {
        $this->service->update($subscriber, $request->safe()->all());

        return new SubscriberResource($subscriber);
    }

    /**
     * Delete the subscriber.
     *
     * @param  Subscriber  $subscriber
     * @return Response
     */
    public function destroy(Subscriber $subscriber): Response
    {
        $this->service->delete($subscriber);

        return response()->noContent();
    }
}
