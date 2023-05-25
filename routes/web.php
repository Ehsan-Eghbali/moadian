<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
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

Route::get('/test', [HomeController::class,'db']);
Route::prefix('')->middleware('auth')->group(function (){
    Route::get('/', [Controller::class,'home'])->name('home');

    Route::prefix('invoices/')->group(function (){
        Route::get('cartable',[InvoiceController::class,'cartable']);
        Route::post('cartable',[InvoiceController::class,'cartable'])->name('invoice.cartable');
        Route::put('approve',[InvoiceController::class,'approve'])->name('invoice.approve');
        Route::get('update-data',[InvoiceController::class,'update_data'])->name('invoice.update_data');
    });
    Route::prefix('import/')->group(function (){
        Route::get('invoice',[InvoiceController::class,'index_import'])->name('invoice.index_import');
        Route::post('invoice',[InvoiceController::class,'store_import'])->name('invoice.store_import');

    });



    Route::resources([
        'user'=>    UserController::class,
        'invoice'=> InvoiceController::class,
        'product'=> ProductController::class,
        'company'=> CompanyController::class,
        'state'=> StateController::class,
    ]);

});

require __DIR__.'/artisan.php';

require __DIR__.'/auth.php';

