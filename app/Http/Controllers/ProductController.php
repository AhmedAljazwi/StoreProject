<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class ProductController extends Controller
{
    public function index() {
        $inventories = Inventory::all();
        return view('index', compact('inventories'));
    }
}
