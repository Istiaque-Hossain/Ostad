<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\User;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    public function index()
    {
        $incomes = auth()->user()->incomes()->paginate(10);
        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        auth()->user()->incomes()->create($request->all());

        return redirect()->route('incomes.index')
            ->with('success', 'Income record created successfully.');
    }

    // Add edit and update methods

    public function destroy(Income $income)
    {
        $income->delete();

        return redirect()->route('incomes.index')
            ->with('success', 'Income record deleted successfully.');
    }
}
