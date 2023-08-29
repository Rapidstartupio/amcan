<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;
use App\Http\Controllers\Dashboard\LoanController;
use App\Http\Controllers\Dashboard\CreditHealthController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\ApiController;


// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Wave routes
Wave::routes();

// Loan Routes
Route::get('dashboard/loan', [LoanController::class, 'index'])->name('loan.index');
// Credit Health Routes
Route::get('dashboard/credit-health', [CreditHealthController::class, 'index'])->name('credit-health.index');
// Transaction Routes
Route::get('dashboard/transactions', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('dashboard/transaction/{id}', [TransactionController::class, 'view'])->name('transaction.view');

// Onboarding Route
Route::get('onboarding/{step?}', '\App\Http\Controllers\OnboardingController@index')->name('onboarding.step');
