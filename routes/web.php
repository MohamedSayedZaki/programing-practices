<?php

use App\Http\Controllers\Patterns\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscription/{type}', [SubscriptionController::class, 'getSubscription']);