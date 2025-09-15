<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Bill;
use App\Models\Status;

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

        $checkProduct = Product::where('category_id', $id)->first();
        if($checkProduct) {
            return redirect('/admin/categories')->with('failed', 'التصنيف مرتبط بأحد المنتجات');
        }

        if($category) {
            $category->delete();
        }
        return redirect('/admin/categories');
    }

    //////PRODUCTS//////
    public function products() {
        $products = Product::latest()->get();
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

    //////INVENTORY//////
    public function inventory() {
        $inventories = Inventory::latest()->get();
        return view('admin.inventory', compact('inventories'));
    }

    public function createInventory() {
        $products = Product::latest()->get();
        return view('admin.create-inventory', compact('products'));
    }

    public function storeInventory(Request $request) {
        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
            'selectedProduct' => 'required',
        ],[
            'quantity.required' => 'كمية المنتج مطلوبة',
            'price.required' => 'سعر المنتج مطلوب',
            'selectedProduct.required' => 'المنتج مطلوب',
        ]);

        $checkProduct = Inventory::where('product_id', $request['selectedProduct'])->first();
        if($checkProduct) {
            return redirect('/admin/inventories')->with('failed', 'المنتج موجود من قبل');
        }
        
        $newInventory = new Inventory;
        $newInventory->price = $request['price'];
        $newInventory->quantity = $request['quantity'];
        $newInventory->product_id = $request['selectedProduct'];
        $newInventory->save();

        return redirect('/admin/inventories')->with('success', 'تم الحفظ بنجاح');
    }

    public function editInventory($id) {
        $inventory = Inventory::find($id);
        if($inventory) {
            return view('admin.edit-inventory', compact('inventory'));
        }
    }

    public function updateInventory(Request $request, $id) {
        $inventory = Inventory::find($id);
        if($inventory) {
            $inventory->quantity = $request['quantity'];
            $inventory->price = $request['price'];
            $inventory->save();

            return redirect('/admin/inventories')->with('success', 'تم تحديث المنتج');
        }
    }

    public function deleteInventory($id) {
        $checkInventory = Inventory::find($id);
        if($checkInventory) {
            $checkCart = Cart::where('inventory_id', $id)->first();
            if($checkCart) {
                return redirect('failed', 'لا يمكن حذف المنتج لأنه في العربة');
            }
            else {
                $checkOrder = Order::where('inventory_id', $id)->first();
                if($checkOrder) {
                    return redirect('failed', 'لا يمكن حذف المنتج لأنه موجود في طلبية ');
                }
                else {
                    $checkInventory->delete();
                    return redirect('success', 'تم حذف المنتج من المخزن بنجاح');
                }
            }
        }
    }

    public function orders() {
        $bills = Bill::with('orders')->orderBy('status_id', 'ASC')->get();
        return view('admin.orders', compact('bills'));
    }

    public function editOrder($id) {
        $bill = Bill::find($id);
        $statuses = Status::all();
        return view('admin.edit-order', compact('bill', 'statuses'));
    }

    public function updateOrder(Request $request, $id) {
        $request->validate([
            'selectedStatus' => 'required',
        ],[
            'selectedStatus.required' => 'الحالة مطلوبة',
        ]);

        $bill = Bill::find($id);
        if($bill) {
            $bill->status_id = $request['selectedStatus'];
            $bill->save();

            return redirect('/admin/orders')->with('success', 'تم التحديث بنجاح');
        }
    }
}
