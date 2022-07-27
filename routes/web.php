<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {

    // Dashboard Route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Course Routes
    Route::prefix('/courses')->group(function() {
        Route::get('/', [CourseController::class, 'index'])->name('admin.course');
        Route::get('/create', [CourseController::class, 'create'])->name('admin.course.create');
        Route::post('/store', [CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/{course}/update', [CourseController::class, 'update'])->name('admin.course.update'); 
    });

});