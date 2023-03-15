<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(){
        $products = Product::orderByDesc('id')->get();
        return view('admin.products.index',compact('products'));
    }
    function add(){
        return view('admin.products.add');
    }
    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name'=>'required',
            'price'=>'required|numeric|max:999999|min:0',
            'stock'=>'required|numeric',
            'description'=>'required',
            'category_id'=>'required'
        ];
        $messages = [
            'name'=>'Tên sản phẩm',
            'price'=>'Giá',
            'stock'=>'Tồn kho',
            'description'=>'Mô tả',
            'category_id'=>'Danh mục'
        ];

        $this->customValidate($data,$rules,$messages);


        $file = $request->file('image');
        if($file){
            $filename = $file->hashName();
            $file->store('/public/products');
            $data['image'] = $filename;
        }

        $product = Product::updateOrCreate($data);
        $product->save();

        return back();
    }
}
