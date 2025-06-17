<?php

use App\Jobs\SendNewsletterJob;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('dispatches the SendNewsletterJob', function () {
    Bus::fake();

    $response = $this->post('/api/subscribers', [
        'name' => 'John Doe',
        'email' => 'test@test.com',
        'is_active' => true,
    ]);

    $response->assertStatus(Response::HTTP_CREATED);

    SendNewsletterJob::dispatch($response->original);

    Bus::assertDispatched(SendNewsletterJob::class);
});
