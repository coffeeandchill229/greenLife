<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::orderByDesc('id')->get();
        return view('admin.posts.index', compact('posts'));
    }
    function addOrUpdate($id = null)
    {
        $post_edit = null;
        if ($id) {
            $post_edit = Post::findOrFail($id);
        }
        return view('admin.posts.addOrUpdate', compact('post_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];
        $messages = [
            'title' => 'Tiêu đề',
            'content' => 'Nội dung'
        ];

        $this->customValidate($data, $rules, $messages);

        $file = $request->file('image');
        if ($file) {
            $filename = $file->hashName();
            $file->storeAs('/public/posts', $filename);
            $data['image'] = $filename;
        }

        $data['user_id'] = Auth::user()->id;

        Post::updateOrCreate(['id' => $id], $data);

        return back();
    }
}
