<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route to display all expenses
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Route to show the form for creating a new expense
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');;

// Route to handle the creation of a new expense
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

// Route to show the form for editing an expense
    Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');

// Route to handle the updating of an expense
    Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');

// Route to handle the deletion of an expense
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});
require __DIR__.'/auth.php';

//Route::get('/', function () {
//    return redirect()->route('expenses.index');
//});


