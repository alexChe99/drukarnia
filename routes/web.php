<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use  App\Http\Controllers\ContactController;

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
Route::get('/', [MainController::class,'home'])->name('home');
Route::get('/publications', [MainController::class,'publications'])->name('publications');
Route::get('/events', [MainController::class,'events'])->name('events');
Route::get('/publications/{id_post}',[MainController::class,'getPost'])->name('getPost');
Route::post('/submit', [ContactController::class,'submit'])->name('form');


Auth::routes();


