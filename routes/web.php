<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\SubscriberController;
use App\Http\Controllers\Dashboard\NewsletterController;

// Client
Route::prefix('/')->name('client.')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    // Subscribe
    Route::post('/', 'subscribe');
});

// Dashboard
Route::prefix('/dashboard')->name('dashboard.')->group(function () {
    // Subscribers
    Route::resource('subscribers', SubscriberController::class);

    // Newsletter
    Route::prefix('/newsletter')->name('newsletter.')->controller(NewsletterController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        // Start the campaign
        Route::post('/start', 'start')->name('start');
    });
});
