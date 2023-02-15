<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
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

// wids 439, 440, 441,442,443,444

// index route
Route::get('/', [FrontendController::class, "index"])->name("index");

Route::middleware(['auth', 'verified'])->group(function () {
    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard route
    Route::any('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});


Route::middleware([])->group(function () {
    Route::any('/mitarbeiter', [FrontendController::class, 'mitarbeiter'])->name('mitarbeiter');
    Route::any('/aktuell', [FrontendController::class, 'aktuell'])->name('aktuell');
    Route::any('/bergstrasse', [FrontendController::class, 'bergstrasse'])->name('bergstrasse');
    Route::any('/darmstadt-dieburg', [FrontendController::class, 'darmstadt_dieburg'])->name('darmstadt_dieburg');
    Route::any('/einsatznachsorge', [FrontendController::class, 'einsatznachsorge'])->name('einsatznachsorge');
});


// protected pages
Route::middleware(['auth', 'verified'])->group(function () {
    Route::any('/einsatzprotokoll_berg', [FrontendController::class, 'einsatzprotokoll_berg'])->name('einsatzprotokoll_berg');
    Route::any('/einsatzprotokoll_da', [FrontendController::class, 'einsatzprotokoll_da'])->name('einsatzprotokoll_da');
});
