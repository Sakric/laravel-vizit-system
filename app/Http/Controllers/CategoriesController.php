<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function open()
    {
        return view('dashboard.categories', [
            'categories' => Category::all()
        ]);
    }

    public function store(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        $category->create($attributes);
        return redirect('/dashboard/categories');
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $category->update($attributes);
        return redirect('/dashboard/categories');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect('/dashboard/categories');
    }
}
