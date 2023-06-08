<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class BannerController extends Controller
{
    function index($id = null)
    {
        $banner_edit = null;
        if ($id) {
            $banner_edit = Banner::findOrFail($id);
        }
        $banners = Banner::orderByDesc('id')->get();
        return view('admin.banner.index', compact('banners', 'banner_edit'))->render();
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'image' => 'required'
        ], [
            'image' => 'Hình ảnh'
        ]);

        $file = $request->file('image');

        if ($file) {
            $filename = $file->hashName();
            $file->store('/public/banner');
            $data['image'] = $filename;
        }

        Banner::updateOrCreate(['id' => $id], $data);
        return back();
    }
    function delete($id)
    {
        Banner::destroy($id);
        return back();
    }
}
