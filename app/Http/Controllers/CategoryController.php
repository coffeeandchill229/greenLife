<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class CategoryController extends Controller
{
    function index(){
        $cat = Category::orderByDesc('id')->get();
        return view('admin.categories.index',compact('cat'));
    }
    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name'=>'required|string'
        ];

        $messages = [
            'name'=>'Tên danh mục'
        ];

        $this->customValidate($data,$rules, $messages);

        $file = $request->file('image');
        if($file){
            $filename = $file->hashName();
            $file->store('/public/images','local');
            $data['image'] = $filename;
        }

        $cat = Category::create($data);

        return back();
    }
}
