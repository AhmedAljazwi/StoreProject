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
}
