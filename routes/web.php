<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OdenwaldController;
use App\Http\Controllers\DarmstadtController;
use App\Http\Controllers\BergstrasseController;
use App\Http\Controllers\DarmstadtDieburgController;
use App\Http\Controllers\DienstplanController;
use App\Http\Controllers\UserController;
use App\Models\ImportUser;
use App\Models\User;

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
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // dashboard route
    Route::any('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::any('/kontakt', 'kontakt')->name('kontakt');
});

// kontakt


Route::middleware([])->group(function () {
    Route::any('/mitarbeiter', [FrontendController::class, 'mitarbeiter'])->name('mitarbeiter');
    Route::any('/aktuell', [FrontendController::class, 'aktuell'])->middleware(["auth","verified"])->name('aktuell');
    Route::any('/aktuell', [FrontendController::class, 'aktuell'])->middleware(["auth","verified"])->name('aktuell');
    
    Route::any('/aktuellr', [FrontendController::class, 'redirect'])->middleware(["auth","verified"]);
    Route::any('/aktuellr/view/{id?}', [FrontendController::class, 'aktuellr'])->middleware(["auth","verified"])->name('aktuellr');
    

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


// dienstplan routes
Route::group(['prefix' => 'dienstplan', "as" => "dienstplan.", "controller" => DienstplanController::class,], function () {
    Route::any('/', 'index')->middleware(["auth","verified"]);
    Route::any('/overview', 'dienstplanOverview')->middleware(["auth","verified"])->name("overview");
    Route::any('/aktuell','dienstplanAktuell')->middleware(["auth","verified"])->name("aktuell");
    Route::any('/months','months')->middleware(["auth","verified"])->name("months");
    Route::get('/vacation/{user?}','vacation')->middleware(["auth","verified"])->name("vacation");
    Route::post('/vacation/store','store')->middleware(["auth","verified"])->name("vacation.store");
    Route::delete('/vacation/delete/{id?}','delete')->middleware(["auth","verified"])->name("vacation.delete");
    Route::any('/queryvacation','queryVacation')->middleware(["auth","verified"])->name("queryvacation");
    Route::any('/admin','admin')->middleware(["auth","verified"])->name("admin");
    Route::get('/edit/{id?}','editUser')->middleware(["auth","verified"])->name("edit");
    Route::post('/edit/{id?}','updateUser')->middleware(["auth","verified"])->name("update.user");
    Route::delete('/delete/{id?}','deleteUser')->middleware(["auth","verified"])->name("delete");
    Route::get('/createuser','createUser')->middleware(["auth","verified","isAdmin"])->name("user.create");
    Route::post('/createuser','saveUser')->middleware(["auth","verified","isAdmin"])->name("user.store");
    Route::get('/admin_kontakte','adminKontakte')->middleware(["auth","verified"])->name("admin.kontakte");
    Route::get('/admin_kontakte','adminKontakte')->middleware(["auth","verified"])->name("admin.kontakte");
    Route::get('/admin_kontakte/create','createKontakte')->middleware(["auth","verified"])->name("kontakte.create");
    Route::post('/admin_kontakte/create','storeKontakte')->middleware(["auth","verified"])->name("kontakte.store");
    Route::get('/admin_kontakte/edit/{id?}','editKontakte')->middleware(["auth","verified"])->name("kontakte.edit");
    Route::post('/admin_kontakte/edit/{id?}','updateKontakte')->middleware(["auth","verified"])->name("kontakte.update");
    Route::delete('/admin_kontakte/delete/{id?}','deleteKontakte')->middleware(["auth","verified"])->name("kontakte.delete");
    Route::get('/settings','settings')->middleware(["auth","verified"])->name("settings");
    Route::post('/settings','updateSettings')->middleware(["auth","verified"])->name("settings.update");
    Route::get('/hour-overview','hourOverview')->middleware(["auth","verified"])->name("hour.overview");
});




Route::any('/import', function (){


    echo md5("Lsjr4h789");

    // ravo password cddd6948bbdead2eca1634684cd309fe
    die;

    // return User::all();
    // echo "this is import page";
    $users = [];
    // $oldUsers = ImportUser::where("firma_id",250)->where("username","like","%ravo%")->get();
    // $oldUsers = ImportUser::where("id",1356)->get();
    // $oldUsers = ImportUser::where("firma_id",250)->where("username","like","%ravo%")->first()->toArray();
    $oldUsers = ImportUser::get();

    // return array_keys($oldUsers);

    foreach ($oldUsers as $key => $user) {
        // unset($user['id']);
        // unset($user['firma_id']);
       // $user["wid"]= "";
        $user['title']= $user["titel"];
        $user['first_name']= $user["vorname"];
        $user['last_name']= $user["nachname"];
        // $user['email']= $user[""];
        // $user['username']= $user["username"];
        $user['password']= $user["credential"];
        $user['telephone']= $user["telefon"];
        $user['mobile']= $user["mobil"];
        // $user['fax']= $user[""];
        // $user['plain']= $user[""];
        // $user['salutation']= $user[""];
        // $user['birthdate']= $user[""];
        // $user['street']= $user[""];
        // $user['house_number']= $user[""];
        // $user['zip_code']= $user[""];
        // $user['place']= $user[""];
        // $user['anrede']= $user[""];
        // $user['gebdate']= $user[""];
        // $user['strasse']= $user[""];
        // $user['hausnummer']= $user[""];
        // $user['plz']= $user[""];
        // $user['ort']= $user[""];
        $user['avatar']= $user["image"];
        // $user["isAdmin"]= $user[""];
        // $user["active"]= $user[""];
        // $user["visible"]= $user[""];
        $users[]= $user;
    }



    // foreach ($users as $key => $user) {
    //     // echo "<pre>";
    //     // print_r($user->toArray());
    //     try {
    //         User::create($user->toArray());
    //         echo "Created <br>";
    //     } catch (\Throwable $e) {
    //         // throw $th;
            
    //         echo "Error {$e->getMessage()} <br>";
    //         continue;
    //     }
    // }

    


    // return $users;
});


