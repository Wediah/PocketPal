<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class expenseController extends Controller
{
    public function create()
    {
        $allCategories = Category::all();
        return view('expense.create', compact('allCategories'));
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'amount' => 'required',
            'item' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'item' => $validated['item'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect('/home');
    }

    public function edit(String $id)
    {
        $expense = Expense::findOrFail($id);
        return view('expense.edit', compact('expense'));
    }

    public function update(String $id)
    {
        $updateExpense = Expense::findOrFail($id);

        $updateExpense->update(request()->validate)([
            'amount' => 'required',
            'item' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        return redirect('/home');
    }

    public function delete(String $id)
    {
        $deleteExpense = Category::findOrFail($id);

        $deleteExpense->delete();

        return redirect('/home');
    }
}
