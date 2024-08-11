<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use App\Models\paymentMethod;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class expenseController extends Controller
{
    public function create()
    {
        $allCategories = Category::all();

        $user = Auth::user();
        $allPayments = $user->payments;
//        $allPayments = paymentMethod::all();
        return view('expense.create', compact('allCategories', 'allPayments'));
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'amount' => 'required',
            'item' => 'required',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required',
            'payee' => 'required',
            'payment_id' => 'required|exists:payment_methods,id',
        ]);

        $paymentMethod = paymentMethod::where('id', $validated['payment_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $paymentMethod->balance -= $validated['amount'];
        $paymentMethod->save();

        Expense::create([
            'user_id' => auth()->id(),
            'amount' => $validated['amount'],
            'item' => $validated['item'],
            'category_id' => $validated['category_id'],
            'date' => $validated['date'],
            'payee' => $validated['payee'],
            'payment_id' => $validated['payment_id'],
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
            'date' => 'required',
            'payee' => 'required',
            'payment_id' => 'required|exists:payment_methods,id',
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
