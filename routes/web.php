<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.index');
Route::post('/vehicles', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
Route::put('/vehicles/{id}', [App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicles.destroy');