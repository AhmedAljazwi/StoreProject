<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function home() {
        return view('admin.home');
    }

    public function categories() {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function create() {
        return view('admin.create-category');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'إسم التصنيف مطلوب',
        ]);

        $newCategory = new Category;
        $newCategory->name = $request['name'];
        $newCategory->save();

        return redirect('/admin/categories');
    }
}
