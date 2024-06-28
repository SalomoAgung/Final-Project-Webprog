<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

Route::get('/routes', [RouteController::class, 'apiIndex']);
Route::get('/routes/{id}', [RouteController::class, 'apiShow']);
