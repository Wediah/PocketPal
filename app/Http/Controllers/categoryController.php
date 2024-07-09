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

    public function store()
    {
        $attributes = request()->validate([
            'slug' => SlugService::createSlug(category::class, 'slug', request('name')),
            'name' => 'required',
        ]);

        Category::firstOrCreate($attributes);

        return redirect('/');
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

        return redirect('/');
    }

    public function delete(String $id)
    {
        $delete = Category::findOrFail($id);

        $delete->delete();

        return redirect('/');
    }
}
