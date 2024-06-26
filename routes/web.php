<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompanyController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/transactions', [TransactionController::class, 'index'])->name("get_transactions");
    Route::post('/submitEntry', [TransactionController::class, 'store'])->name('postTransact');
    Route::get('/transaction/get', [TransactionController::class, 'show'])->name('transaction.show');

    Route::post('/submitEntry', [TransactionController::class, 'store'])->name('postTransact');

    Route::post('/saveCompany', [CompanyController::class, 'store'])->name('saveCompany');

    Route::get('/getCompany', [CompanyController::class, 'show'])->name('getCompany');
});

Route::post('/dashboard', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'index']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

