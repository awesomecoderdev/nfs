<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OdenwaldController;
use App\Http\Controllers\DarmstadtController;
use App\Http\Controllers\BergstrasseController;
use App\Http\Controllers\DarmstadtDieburgController;
use App\Http\Controllers\UserController;

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

// users routes
Route::group(['prefix' => 'users', "as" => "users.", "middleware" => ['auth', 'verified'],  "controller" => UserController::class,], function () {
    // profile routes
    Route::get('/', [AuthController::class, 'dashboard'])->name('index');
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard route
    Route::any('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::any('/kontakt', 'kontakt')->name('kontakt');
});

// kontakt


Route::middleware([])->group(function () {
    Route::any('/mitarbeiter', [FrontendController::class, 'mitarbeiter'])->name('mitarbeiter');
    Route::any('/aktuell', [FrontendController::class, 'aktuell'])->name('aktuell');
    // Route::any('/bergstrasse', [FrontendController::class, 'bergstrasse'])->name('bergstrasse');
    // Route::any('/darmstadt-dieburg', [FrontendController::class, 'darmstadt_dieburg'])->name('darmstadt_dieburg');
    Route::any('/einsatznachsorge', [FrontendController::class, 'einsatznachsorge'])->name('einsatznachsorge');
    Route::any('/odenwald', [FrontendController::class, 'odenwald'])->name('odenwald');
    Route::any('/notfallseelsorge', [FrontendController::class, 'notfallseelsorge'])->name('notfallseelsorge');
    Route::any('/mitmachen', [FrontendController::class, 'mitmachen'])->name('mitmachen');
    Route::any('/mithelfen', [FrontendController::class, 'mithelfen'])->name('mithelfen');
    Route::any('/hilfe_erfahren', [FrontendController::class, 'hilfe_erfahren'])->name('hilfe_erfahren');
    Route::any('/darmstadt-und-umgebung', [FrontendController::class, 'darmstadt_und_umgebung'])->name('darmstadt_und_umgebung');
    Route::any('/notfallseelsorge-vor-ort', [FrontendController::class, 'notfallseelsorge_vor_ort'])->name('notfallseelsorge_vor_ort');
});

// bergstrasse routes
Route::group(['prefix' => 'bergstrasse', "as" => "bergstrasse.", "controller" => BergstrasseController::class,], function () {
    Route::any('/', 'index')->name('index');
    Route::any('/kontakt', 'kontakt')->name('kontakt');
    Route::any('/einsatznachsorge', 'einsatznachsorge')->name('einsatznachsorge');
    Route::any('/bergstrasse', 'bergstrasse')->name('bergstrasse');
    Route::any('/bergstrasse_orga', 'bergstrasse_orga')->name('bergstrasse_orga');
    Route::any('/bergstrasse_einsatznachsorge', 'bergstrasse_einsatznachsorge')->name('bergstrasse_einsatznachsorge');
    Route::any('/bergstrasse_ansprechpartner', 'bergstrasse_ansprechpartner')->name('bergstrasse_ansprechpartner');
});

// darmstadt routes
Route::group(['prefix' => 'darmstadt', "as" => "darmstadt.", "controller" => DarmstadtController::class,], function () {
    Route::any('/', 'index')->name('index');
    Route::any('/einsatznachsorge', 'einsatznachsorge')->name('einsatznachsorge');
    Route::any('/da_orga', 'da_orga')->name('da_orga');
    Route::any('/darmstadt_kontakt', 'darmstadt_kontakt')->name('darmstadt_kontakt');
    Route::any('/da_einsatznachsorge', 'da_einsatznachsorge')->name('da_einsatznachsorge');
    Route::any('/da_notfallseelsorge', 'da_notfallseelsorge')->name('da_notfallseelsorge');
    Route::any('/da_ansprechpartner', 'da_ansprechpartner')->name('da_ansprechpartner');
});

// odenwald routes
Route::group(['prefix' => 'odenwald', "as" => "odenwald.", "controller" => OdenwaldController::class,], function () {
    Route::any('/', 'index')->name('index');
    Route::any('/odenwald', 'odenwald')->name('odenwald');
    Route::any('/einsatznachsorge', 'einsatznachsorge')->name('einsatznachsorge');
    Route::any('/odenwald_orga', 'odenwald_orga')->name('odenwald_orga');
    Route::any('/odenwald_kontakt', 'odenwald_kontakt')->name('odenwald_kontakt');
    Route::any('/odenwald_notfallseelsorge', 'odenwald_notfallseelsorge')->name('odenwald_notfallseelsorge');
    Route::any('/odenwald_einsatznachsorge', 'odenwald_einsatznachsorge')->name('odenwald_einsatznachsorge');
    Route::any('/odenwald_ansprechpartner', 'odenwald_ansprechpartner')->name('odenwald_ansprechpartner');
});

// darmstadt-dieburg routes
Route::group(['prefix' => 'darmstadt-dieburg', "as" => "dieburg.", "controller" => DarmstadtDieburgController::class,], function () {
    Route::any('/', 'index')->name('index');
    Route::any('/dadi', 'dadi')->name('dadi');
    Route::any('/einsatznachsorge', 'einsatznachsorge')->name('einsatznachsorge');
    Route::any('/dadi_orga', 'dadi_orga')->name('dadi_orga');
    Route::any('/dadi_kontakt', 'dadi_kontakt')->name('dadi_kontakt');
    Route::any('/dadi_notfallseelsorge', 'dadi_notfallseelsorge')->name('dadi_notfallseelsorge');
    Route::any('/dadi_einsatznachsorge', 'dadi_einsatznachsorge')->name('dadi_einsatznachsorge');
    Route::any('/dadi_ansprechpartner', 'dadi_ansprechpartner')->name('dadi_ansprechpartner');
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
