<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function store(Request $request, $post_id = null, $customer_id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $data['post_id'] = $post_id;
        $data['customer_id'] = $customer_id;

        Comment::updateOrCreate($data);
        return back();
    }
    function delete($id = null)
    {
        $comment = Comment::findOrFail($id);
        // Nếu comment có reply thì xóa tất cả reply
        if ($comment->replies) {
            foreach ($comment->replies as $c) {
                Reply::destroy($c->id);
            }
            Comment::destroy($id);
        }
        return back();
    }
}
