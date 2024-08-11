<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\paymentMethod;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paymentMethodController extends Controller
{
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('payment.create');
    }

    public function index()
    {
        $allPayments = paymentMethod::all();
        return view('payment.index', compact('allPayments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        paymentMethod::firstOrCreate([
            'user_id' => auth()->id(),
            'slug' => SlugService::createSlug(paymentMethod::class, 'slug', request('name')),
            'name' => request('name'),
        ]);

        return redirect('/home');
    }

    public function edit(String $id)
    {
        $payment = paymentMethod::findOrFail($id);
        return view('payment.edit', compact('payment'));
    }

    public function update(String $id)
    {
        $update = paymentMethod::findOrFail($id);

        $update->update(request()->validate)([
            'slug' => SlugService::createSlug(paymentMethod::class, 'slug', request('name')),
            'name' => 'required',
        ]);

        return redirect('/home');
    }

    public function delete(String $id)
    {
        $delete = paymentMethod::findOrFail($id);

        $delete->delete();

        return redirect()->back();
    }

    public function record(Request $request, string $id)
    {
        $user = Auth::user();
        $account = paymentMethod::findOrFail($id);

        $validatedData = $request->validate([
            'balance' => 'required|numeric|min:0',
        ]);

        $account->balance += $validatedData['balance'];
        $account->save();

        return redirect('/home');
    }

    public function recording()
    {
        $user = Auth::user();
        return view('payment.record', compact('user'));
    }
}
