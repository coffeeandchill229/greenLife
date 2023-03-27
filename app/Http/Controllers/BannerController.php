<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function index($id = null)
    {
        $banner_edit = null;
        if ($id) {
            $banner_edit = Banner::findOrFail($id);
        }
        $banners = Banner::orderByDesc('id')->get();
        return view('admin.banner.index', compact('banners', 'banner_edit'));
    }
    function store(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

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
