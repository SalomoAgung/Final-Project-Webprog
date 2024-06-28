<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/routes', [RouteController::class, 'index'])->name('routes.index');
Route::get('/routes/{id}', [RouteController::class, 'show'])->name('routes.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/routes/create', [AdminController::class, 'create'])->name('admin.routes.create');
    Route::post('/admin/routes', [AdminController::class, 'store'])->name('admin.routes.store');
    Route::get('/admin/routes/{id}/edit', [AdminController::class, 'edit'])->name('admin.routes.edit');
    Route::put('/admin/routes/{id}', [AdminController::class, 'update'])->name('admin.routes.update');
    Route::delete('/admin/routes/{id}', [AdminController::class, 'destroy'])->name('admin.routes.destroy');
});

Auth::routes();
