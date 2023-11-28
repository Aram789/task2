<?php

use App\Http\Controllers\Admin\History\HistoryController;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NoticeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(NoticeController::class)->group(function () {
    Route::get('/', 'index');
});


Route::get('/histories/{urlHash}', [HistoryController::class, 'show'])->name('histories.show');

Auth::routes();

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/histories', [HistoryController::class, 'index'])->name('histories.index');
    Route::get('/histories/create', [HistoryController::class, 'create'])->name('histories.create');
    Route::post('/histories', [HistoryController::class, 'store'])->name('histories.store');
    Route::put('/histories/{history}', [HistoryController::class, 'update'])->name('histories.update');
    Route::post('/filter', [HistoryController::class, 'filter'])->name('histories.filter');
});





