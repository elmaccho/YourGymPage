<?php

use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth', 'verified'])->group(function(){

    Route::middleware('can:isAdmin')->group(function(){
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        Route::resource('products', ProductController::class);

        Route::get('/users/list', [UserController::class, 'index']);
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    });

    Route::get('/cart/list', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Route::get('/products', [ProductController::class, 'index'])->name("products.index")->middleware('auth');
// Route::post('/products', [ProductController::class, 'store'])->name("products.store")->middleware('auth');
// Route::get('/products/create', [ProductController::class, 'create'])->name("products.create")->middleware('auth');
// Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name("products.edit")->middleware('auth');
// Route::get('/products/show/{product}', [ProductController::class, 'show'])->name("products.show")->middleware('auth');
// Route::post('/products/{product}', [ProductController::class, 'update'])->name("products.update")->middleware('auth');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name("products.destroy")->middleware('auth');


Auth::routes(['verify' => true]);