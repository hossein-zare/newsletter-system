<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:send-newsletter')
    ->dailyAt('09:00')
    ->runInBackground();
