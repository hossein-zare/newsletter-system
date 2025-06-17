<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SubscriberController;

Route::apiResource('subscribers', SubscriberController::class);
