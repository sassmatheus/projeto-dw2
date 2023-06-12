<?php

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

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create'])->middleWare('auth');

Route::get('/products/{id}', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store']);

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('auth');

Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');

Route::put('/products/update/{id}', [ProductController::class, 'update'])->middleware('auth');

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');

Route::post('/products/join/{id}', [ProductController::class, 'joinProduct'])->middleware('auth');

Route::delete('/products/leave/{id}', [ProductController::class, 'leaveProduct'])->middleware('auth');

