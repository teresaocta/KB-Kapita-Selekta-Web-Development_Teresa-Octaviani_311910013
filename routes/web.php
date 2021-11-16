<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\bukuController;

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

Route::get('/', [bukuController::class, 'getHome']);

Route::get('/title', [bukuController::class, 'getTitle']);

Route::get('/category', [bukuController::class, 'getCategory']);