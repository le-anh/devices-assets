<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
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

Route::get('/', [AdminController::class, 'index'])->middleware(['auth']);

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){
    Route::get('', [AdminController::class, 'index'])->middleware(['auth'])->name('index');
    Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');

    
    Route::prefix('order')->name('order.')->group(function(){
        Route::get('', [OrderController::class, 'index'])->name('index');
        Route::get('delivered/index', [OrderController::class, 'deliveredindex'])->name('delivered.index');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::put('update', [OrderController::class, 'update'])->name('update');
        Route::delete('destroy', [OrderController::class, 'destroy'])->name('destroy');
        Route::post('delivered', [OrderController::class, 'delivered'])->name('delivered');
    });

    Route::prefix('bill')->name('bill.')->group(function(){
        Route::get('', [BillController::class, 'index'])->name('index');
        Route::post('store', [BillController::class, 'store'])->name('store');
        Route::put('update', [BillController::class, 'update'])->name('update');
        Route::delete('destroy', [BillController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('customer')->name('customer.')->group(function(){
        Route::get('', [CustomerController::class, 'index'])->name('index');
        Route::post('store', [CustomerController::class, 'store'])->name('store');
        Route::put('update', [CustomerController::class, 'update'])->name('update');
        Route::delete('destroy', [CustomerController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('product')->name('product.')->group(function(){
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::put('update', [ProductController::class, 'update'])->name('update');
        Route::delete('destroy', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('product-type')->name('product_type.')->group(function(){
        Route::get('', [ProductTypeController::class, 'index'])->name('index');
        Route::post('store', [ProductTypeController::class, 'store'])->name('store');
        Route::put('update', [ProductTypeController::class, 'update'])->name('update');
        Route::delete('destroy', [ProductTypeController::class, 'destroy'])->name('destroy');
    });
});


Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
