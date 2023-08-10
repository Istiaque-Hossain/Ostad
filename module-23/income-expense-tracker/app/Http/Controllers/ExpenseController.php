<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = auth()->user()->expenses()->paginate(10);
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        auth()->user()->expenses()->create($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense record created successfully.');
    }

    // Add edit and update methods

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense record deleted successfully.');
    }
}
