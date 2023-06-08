<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    function index(Request $request)
    {
        $filters = [];
        $products = null;

        if (!empty($request->key)) {
            $filters[] = ['name', 'like', '%' . $request->key . '%'];
        }
        if (!empty($request->category_id)) {
            $filters[] = ['category_id', $request->category_id];
        }
        $categories = Category::all();
        $products = Product::where($filters)->orderByDesc('id')->paginate(4);
        return view('admin.products.index', compact('products', 'categories'));
    }
    function addOrUpdate($id = null)
    {
        $product_edit = null;
        if ($id) {
            $product_edit = Product::findOrFail($id);
        }
        return view('admin.products.addOrUpdate', compact('product_edit'));
    }
    function store(ProductRequest $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $file = $request->file('image');
        if ($file) {
            $filename = $file->hashName();
            $file->store('/public/products');
            $data['image'] = $filename;
        }
        $product = Product::updateOrCreate(['id' => $id], $data);
        $product->save();
        return back();
    }
    function delete($id = null)
    {
        Product::destroy($id);
        return back();
    }
    function active_product($id = null)
    {
        if ($id) {
            $product = Product::find($id);
            if ($product->status == 0) {
                $product->update(['status' => 1]);
                $product->save();
                return response()->json(['message' => 'Đã hiển thị sản phẩm'], 200);
            } else {
                $product->update(['status' => 0]);
                $product->save();
                return response()->json(['message' => 'Đã ẩn sản phẩm'], 200);
            }
        } else {
            return response()->json(['message' => 'Fail'], 404);
        }
    }
}