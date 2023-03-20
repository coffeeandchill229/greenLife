<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    function index($id = null)
    {
        $cat_edit = null;
        if ($id) {
            $cat_edit = Category::findOrFail($id);
        }
        $cat = Category::orderBy('image')->get();
        Alert::success('Success Title', 'Success Message');

        return view('admin.categories.index', compact('cat', 'cat_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'name' => 'required|string'
        ];

        $messages = [
            'name' => 'Tên danh mục'
        ];

        $this->customValidate($data, $rules, $messages);

        $file = $request->file('image');
        if ($file) {
            $filename = $file->hashName();
            $file->store('/public/images', 'local');
            $data['image'] = $filename;
        }

        $cat = Category::updateOrCreate(['id' => $id], $data);
        $cat->save();
        return back();
    }
    function delete($id)
    {
        Category::destroy($id);
        return back();
    }
}
