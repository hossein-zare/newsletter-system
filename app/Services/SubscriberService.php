<?php

namespace App\Services;

use App\Models\Subscriber;
use Illuminate\Pagination\LengthAwarePaginator;

final class SubscriberService
{
    /**
     * Retrieve and paginate the list of subscribers.
     *
     * @param  int  $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return Subscriber::latest('id')->paginate($perPage);
    }

    /**
     * Create a subscriber.
     *
     * @param  array  $data
     * @return Subscriber
     */
    public function create(array $data): Subscriber
    {
        return Subscriber::create($data);
    }

    /**
     * Update the subscriber.
     *
     * @param  Subscriber  $subscriber
     * @param  array  $data
     * @return bool
     */
    public function update(Subscriber $subscriber, array $data): bool
    {
        return $subscriber->update($data);
    }

    /**
     * Delete the subscriber.
     *
     * @param  Subscriber  $subscriber
     * @return bool
     */
    public function delete(Subscriber $subscriber): bool
    {
        return $subscriber->delete();
    }
}
