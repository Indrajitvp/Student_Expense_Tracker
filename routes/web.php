<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect the root URL to the expenses index page
Route::get('/', function () {
    return redirect()->route('expenses.index');
});

// Route to display all expenses
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Route to show the form for creating a new expense
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');

// Route to handle the creation of a new expense
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');

// Route to show the form for editing an expense
Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');

// Route to handle the updating of an expense
Route::put('/expenses/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');

// Route to handle the deletion of an expense
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
