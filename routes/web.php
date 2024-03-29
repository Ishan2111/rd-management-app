<?php

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::resource('users', UserController::class);
Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('export', [UserController::class, 'export'])->name('export');
Route::get('/autocomplete/payments', [UserController::class, 'payments'])->name('autocomplete.payments');
