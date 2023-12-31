<?php

use App\Models\Partretur;
use App\Models\Transorder;
use App\Models\Salesmaster;
use App\Models\DeliveryNote;
use App\Models\Customermaster;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BrgmskController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrgkeluarController;
use App\Http\Controllers\CustorderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartreturController;
use App\Http\Controllers\TransorderController;
use App\Http\Controllers\SalesmasterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\API\MidtransController;
use App\Http\Controllers\CustomermasterController;
use App\Http\Controllers\KirimEmailController;

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

// homepage
Route::get('/', function () {
    return redirect()->route('dashboard');
});



// dashboard Super Admin
Route::prefix('dashboard')->middleware(['auth:sanctum', 'admin'])->group(function()

{
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('food', FoodController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('brgmsk', BrgmskController::class);
    Route::resource('brgkeluar', BrgkeluarController::class);
    Route::resource('custorder', CustorderController::class);
    Route::resource('transorder', TransorderController::class);
    Route::resource('partretur', PartreturController::class);
    Route::resource('customermaster', CustomermasterController::class);
    Route::resource('salesmaster', SalesmasterController::class);

    // Recap Laporan Sales Views
    Route::get('laporansales/pernama', [SalesController::class, 'pernama'])->name('pernama');
    Route::get('laporansales/perbulan', [SalesController::class, 'perbulan'])->name('perbulan');
    Route::get('laporansales/notapembelian', [SalesController::class, 'notapembelian'])->name('notapembelian');

    // Report Recap laporan sales PDF
    Route::get('notapembelianpdf/{filter}', [SalesController::class, 'notapembelianpdf'])->name('notapembelianpdf');
    Route::get('notapembelianpdfid/{id}', [SalesController::class, 'notapembelianpdfid'])->name('notapembelianpdfid');
    Route::get('pernamapdf/{filter}', [SalesController::class, 'pernamapdf'])->name('pernamapdf');
    Route::get('perbulanpdf/{filter}', [SalesController::class, 'perbulanpdf'])->name('perbulanpdf');
    // Route::get('laporansales/pernama', ['SalesController@pernama'])->name('laporansales.pernama');
    // Route::get('laporansales/perbulan', ['SalesController@perbulan'])->name('laporansales.perbulan');
    // Route::get('laporansales/notapembelian', ['SalesController@notapembelian'])->name('laporansales.notapembelian');

    // Validasi
    Route::patch('sales/{id}/validasi', [SalesController::class, 'validasi'])->name('validasisales');
    // Route::patch('/cuti/{id}/validated', 'CutiController@validasi')->name('cuti.validated');


    // cetak PDF
    Route::get('exportpdf', [ProductController::class, 'exportpdf'])->name('exportpdf');
    Route::get('customerpdf', [CustomerController::class, 'customerpdf'])->name('customerpdf');
    Route::get('salespdf', [SalesController::class, 'salespdf'])->name('salespdf');
    Route::get('brgmasukpdf', [BrgmskController::class, 'brgmasukpdf'])->name('brgmasukpdf');
    Route::get('brgkeluarpdf', [BrgkeluarController::class, 'brgkeluarpdf'])->name('brgkeluarpdf');
    Route::get('custorderpdf', [CustorderController::class, 'custorderpdf'])->name('custorderpdf');
    Route::get('transorderpdf', [TransorderController::class, 'transorderpdf'])->name('transorderpdf');
    Route::get('partreturpdf', [PartreturController::class, 'partreturpdf'])->name('partreturpdf');


    // update status transaction
    Route::get('tranasctions/{id}/status/{status} ', [TransactionController::class, 'changeStatus'])->name('transaction.changeStatus');
    Route::resource('transaction', TransactionController::class);

    // HakAkses admin Service
    Route::group(['middleware'=>['auth','hakakses:adminservice']], function(){

    });

    // HakAkses admin Warehouse
    Route::group(['middleware'=>['auth','hakakses:adminwarehouse']], function(){

    });

    // HakAkses admin Sales
    Route::group(['middleware'=>['auth','hakakses:adminsales']], function(){

    });
});


