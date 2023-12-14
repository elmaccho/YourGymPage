<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/main', [MainController::class,'index'])->name('main.index');
Route::get('/main/pass', [MainController::class,'pass'])->name('main.pass');

Route::post('/main/pass', [MainController::class, 'update'])->name('main.update');

Route::middleware(['auth', 'verified'])->group(function(){

    

    Route::middleware('can:isAdmin')->group(function(){
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);
        
        Route::resource('users', UserController::class)->only([
            'index',
            'update',
            'edit',
            'destroy',
        ]);

    });
    

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/info', [CartController::class, 'info'])->name('cart.info')->middleware('checkCartContent');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::post('/payment/status', [PaymentController::class, 'status']);


Auth::routes(['verify' => true]);