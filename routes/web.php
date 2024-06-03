<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return view('login');
});



Route::get('/login', [LoginController::class, 'index']);
Route::post('/dashboard', [LoginController::class, 'login'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/submitEntry', [TransactionController::class, 'store'])->name('postTransact');