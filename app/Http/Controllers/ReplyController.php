<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    function store(Request $request, $comment_id, $customer_id)
    {
        $data = $request->all();
        unset($data['_token']);

        $data['comment_id'] = $comment_id;
        $data['customer_id'] = $customer_id;

        Reply::create($data);

        return back();
    }
    function delete($id = null)
    {
        Reply::destroy($id);
        return back();
    }
}
