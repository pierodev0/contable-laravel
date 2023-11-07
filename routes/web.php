<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientAjaxController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect('movements');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/accounts', AccountController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/categories', CategoryController::class);
    // Route::resource('/movements', MovementController::class);
    Route::get('/movements', [MovementController::class, 'index'])->name('movements.index');
    Route::get('/movements/create/{invoice?}', [MovementController::class, 'create'])->name('movements.create');
    Route::post('/movements', [MovementController::class, 'store'])->name('movements.store');
    Route::get('/movements/{movement}', [MovementController::class, 'show'])->name('movements.show');
    Route::get('/movements/{movement}/edit', [MovementController::class, 'edit'])->name('movements.edit');
    Route::put('/movements/{movement}', [MovementController::class, 'update'])->name('movements.update');
    Route::delete('/movements/{movement}', [MovementController::class, 'destroy'])->name('movements.destroy');

    Route::resource('/items', ItemController::class);
    Route::resource('/invoices', InvoiceController::class);

    // Api sunat ajax
    Route::get('clients/ajax/{ruc}',ClientAjaxController::class);
});
require __DIR__ . '/auth.php';
