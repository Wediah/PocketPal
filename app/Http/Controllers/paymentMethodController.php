<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\paymentMethod;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

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

    public function store()
    {
        $attributes = request()->validate([
            'slug' => SlugService::createSlug(paymentMethod::class, 'slug', request('name')),
            'name' => 'required',
        ]);

        paymentMethod::firstOrCreate($attributes);

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
}
