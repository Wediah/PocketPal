<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('category.create');
    }

    public function index()
    {
        $allCategories = Category::all();
        return view('category.index', compact('allCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename);
        }

        Category::firstOrCreate([
            'slug' => SlugService::createSlug(category::class, 'slug', request('name')),
            'name' => $request->input('name'),
            'image' => $filename ?? null,
        ]);

        return redirect('/home');
    }

    public function edit(String $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(String $id)
    {
        $update = Category::findOrFail($id);

        $update->update(request()->validate)([
            'slug' => SlugService::createSlug(category::class, 'slug', request('name')),
            'name' => 'required',
        ]);

        return redirect('/home');
    }

    public function delete(String $id)
    {
        $delete = Category::findOrFail($id);

        $delete->delete();

        return redirect()->back();
    }
}
