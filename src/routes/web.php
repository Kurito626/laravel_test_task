<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('home');
});

Route::post('/newLink', [LinkController::class, 'createLink'])->name('links.createLink');

Route::get('/{shortLink}', [LinkController::class, 'getLink']);
