<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// default routes
Route::view('/', 'pages.home')->name('home');
