<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Apply the auth middleware to all post routes
Route::resource('posts', PostController::class);
