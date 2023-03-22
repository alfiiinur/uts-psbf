<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BarangController;
use App\Http\Controlllers\LogAcController;
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

Route::group(['middleware' => 'auth'], function() {


    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);
    Route::resource('warga', WargaController::class);
    
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('admin.adminDashboard');
        })->name('adminDashboard');

        Route::resource('saldosampah', SaldoSampahController::class);
        Route::get('/logAc', [WargaController::class, 'viewactivity']);
    });

    
    Route::resource('barang', BarangController::class);
    Route::get('/export', [WargaController::class, 'export']);
    Route::get('/exportMs', function(){
    return view('admin.cetakWord',[
        'warga'=>warga::all()
    ]);
    Route::get('/cetakPdf', function(){
        return view('admin.cetakPdf', [
            'warga' => warga::all()
        ]);
    });

    Route::get('/cetakWord', function(){
        return view('admin.cetakWord', [
            'warga' => warga::all()
        ]);
    });
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

    Route::get('/logActivity',[ProfileController::class, 'viewactivity']);
});

require __DIR__.'/auth.php';
