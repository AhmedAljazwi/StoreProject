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

    public function edit($id) {
        $category = Category::find($id);
        if($category) {
            return view('admin.edit-category', compact('category'));
        }
        else {
            return redirect('/admin/categories');
        }
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'إسم التصنيف مطلوب',
        ]);

        $category = Category::find($id);
        if($category) {
            $category->name = $request['name'];
            $category->save();
        }
        return redirect('admin/categories');
    }

    public function delete($id) {
        $category = Category::find($id);
        if($category) {
            $category->delete();
        }
        return redirect('/admin/categories');
    }

    //////PRODUCTS//////
    public function products() {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }
}
