<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the expenses.
     */
    public function index()
    {
        // Show only logged-in user's expenses
        $expenses = Expense::where('user_id', Auth::id())->get();
        $totalAmount = $expenses->sum('amount');
        return view('expenses.index', compact('expenses', 'totalAmount'));
    }

    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created expense.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'required|string|max:100',
        ]);

        Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
            'user_id' => Auth::id(), // Assign expense to logged-in user
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }

    /**
     * Show the form for editing the specified expense.
     */
    public function edit($id)
    {
        $expense = Expense::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified expense.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category' => 'required|string|max:100',
        ]);

        $expense = Expense::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $expense->update([
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified expense.
     */
    public function destroy($id)
    {
        $expense = Expense::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
