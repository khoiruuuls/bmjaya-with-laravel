<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthRedirectController;
use App\Http\Controllers\SalesController;

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
    return view('auth.login');
});
Route::post('/logout', [AuthRedirectController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout-and-register', [AuthRedirectController::class, 'logoutAndRedirectToRegister'])
    ->middleware(['web', 'auth'])  // Apply authentication middleware
    ->name('logout-and-register');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order/all', [OrderController::class, 'show'])->name('orders.show');
Route::get('/sales/all', [SalesController::class, 'show'])->name('sales.show');
Route::get('/orders/{order}/pick-date', [OrderController::class, 'pick_date'])->name('orders.pick-date');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::delete('/sales/{order}', [SalesController::class, 'destroy'])->name('sales.destroy');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::get('/sales/{order}/edit', [SalesController::class, 'edit'])->name('sales.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::put('/sales/{order}', [SalesController::class, 'update'])->name('sales.update');