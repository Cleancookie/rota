<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\TimeslotController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('', [AdminController::class, 'show'])->name('show');
    Route::resource('timeslots', TimeslotController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('staff', StaffController::class);
});
