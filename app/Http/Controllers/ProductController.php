<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class ProductController extends Controller
{
    public function index() {
        $inventories = Inventory::where('quantity', '>', 0)->get();
        return view('index', compact('inventories'));
    }
}
