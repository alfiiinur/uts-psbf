<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SaldoSampahController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BarangController;
use App\Models\warga;



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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['middleware' => 'auth'], function() {
    // Route::get('/dashboard', 'Dashboard')->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    // Route::get('/karyawan', [KaryawanController::class, 'index']);
    // Route::resource('karyawan', KaryawanController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('barang', BarangController::class);
    
    // Route::get('/izin', [IzinController::class, 'index']);
    Route::resource('saldosampah', SaldoSampahController::class);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('admin.adminDashboard');
        })->name('adminDashboard');
        Route::post('/izin', [IzinController::class, 'store']);
        Route::get('/izin/create', [IzinController::class, 'create']);
        Route::post('/izin/{id}', [IzinController::class, 'destroy']);

        Route::get('/pelanggaran', [PelanggaranController::class, 'index']);
        Route::post('/pelanggaran', [PelanggaranController::class, 'store']);
        Route::get('/pelanggaran/create', [PelanggaranController::class, 'create']);
        Route::post('/pelanggaran/{id}', [PelanggaranController::class, 'destroy']);
        Route::get('/pelanggaran/{id}', [PelanggaranController::class, 'detail']);


        

    });

    // Route::get('/cetakExcel', [WargaController::class, 'cetakExcel']);

    Route::get('/cetakExcel', function(){
        return view('admin.cetakExcel', [
            'warga' => warga::all()
        ]);
    });

    Route::get('/cetakPdf', function(){
        return view('admin.cetakPdf', [
            'warga' => warga::all()
        ]);
    });

    // Route::get('/cetakWord', function(){
    //     return view('admin.cetakWord', [
    //         'warga' => warga::all()
    //     ]);
    // });

    Route::get('/cetakWord', function(){
        $headers = array(
            "Content-type" => "text/html",
            "Content-Disposition" => "attachment; filename=Data Warga.doc",
        );

        return \Response::make(view('admin.cetakWord', [
            'warga' => warga::all()
        ]), 200, $headers);
    });



    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::get('/userDashboard', function () {
            return view('user.userDashboard');
        })->name('userDashboard');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
