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
    Route::any('/odenwald', [FrontendController::class, 'odenwald'])->name('odenwald');
    Route::any('/notfallseelsorge', [FrontendController::class, 'notfallseelsorge'])->name('notfallseelsorge');
    Route::any('/mitmachen', [FrontendController::class, 'mitmachen'])->name('mitmachen');
    Route::any('/mithelfen', [FrontendController::class, 'mithelfen'])->name('mithelfen');
    Route::any('/hilfe_erfahren', [FrontendController::class, 'hilfe_erfahren'])->name('hilfe_erfahren');
    Route::any('/darmstadt-und-umgebung', [FrontendController::class, 'darmstadt_und_umgebung'])->name('darmstadt_und_umgebung');
    Route::any('/notfallseelsorge-vor-ort', [FrontendController::class, 'notfallseelsorge_vor_ort'])->name('notfallseelsorge_vor_ort');
});


// protected pages
Route::middleware(['auth', 'verified'])->group(function () {
    Route::any('/einsatzprotokoll_berg', [FrontendController::class, 'einsatzprotokoll_berg'])->name('einsatzprotokoll_berg');
    Route::any('/einsatzprotokoll_da', [FrontendController::class, 'einsatzprotokoll_da'])->name('einsatzprotokoll_da');
    Route::any('/einsatzprotokoll_ow', [FrontendController::class, 'einsatzprotokoll_ow'])->name('einsatzprotokoll_ow');
    Route::any('/einsatzprotokoll_nachsorge_da', [FrontendController::class, 'einsatzprotokoll_nachsorge_da'])->name('einsatzprotokoll_nachsorge_da');
    Route::any('/reflexion_berg', [FrontendController::class, 'reflexion_berg'])->name('reflexion_berg');
    Route::any('/reflexion_da', [FrontendController::class, 'reflexion_da'])->name('reflexion_da');
    Route::any('/einsatzprotokoll_dadi', [FrontendController::class, 'einsatzprotokoll_dadi'])->name('einsatzprotokoll_dadi');
    Route::any('/reflexion_dadi', [FrontendController::class, 'reflexion_dadi'])->name('reflexion_dadi');
    Route::any('/reflexion_ow', [FrontendController::class, 'reflexion_ow'])->name('reflexion_ow');
});
