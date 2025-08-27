<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

    public function createProduct() {
        $categories = Category::all();
        return view('admin.create-product', compact('categories'));
    }

    public function storeProduct(Request $request) {
        $product = new Product;
        $product->name = $request['name'];
        $product->image = $request['image'];
        $product->category_id = $request['selectedCategory'];
        $product->save();

        return redirect('admin/products');
    }

    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.edit-product', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'selectedCategory' => 'required',
        ],[
            'name.required' => 'إسم المنتج مطلوب',
            'image.required' => 'الصورة مطلوبة',
            'selectedCategory.required' => 'التصنيف مطلوب',
        ]);

        $product = Product::find($id);
        if($product) {
            $product->name = $request['name'];
            $product->image = $request['image'];
            $product->category_id = $request['selectedCategory'];
            $product->save();

            return redirect('/admin/products');
        }
    }

    public function deleteProduct($id) {
        $product = Product::find($id);
        if($product) {
            $product->delete();
            return redirect('/admin/products');
        }
    }
}
