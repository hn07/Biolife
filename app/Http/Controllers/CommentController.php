<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\News;
use App\Models\Products;
use App\Models\StatusNews;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //post bình luận
    public function addComment(Request $request, $id)
    {

        if (Session::has('loginId_Customer')) {
            $idCustomer = Session::get('loginId_Customer');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'content' => 'required',
            ],
            [
                'content.required' => 'Bạn chưa nhập nội dung bình luận',
            ]
        );

        if ($validator->passes()) {
            $data = [
                'customer_id' => $idCustomer,
                'content' => $request->content,
                'news_id' => $id,
                'reply_id' => $request->reply_id ? $request->reply_id : 0,
            ];
            if ($comment = Comment::create($data)) {
                // $comment = Comment::where('news_id', $id)->where('reply_id', 0)->orderBy('updated_at', 'DESC')->get();
                $comment = Comment::where(['news_id' => $id, 'reply_id' => 0])
                    ->orderBy('updated_at', 'DESC')
                    ->get();

                return view('Frontend.Pages.list-comment', compact('comment'));
            }
        }
        return response()->json(['error' => $validator->errors()->first()]);
    }

    // public function listComment()
    // {
    //     $comment = Comment::all();
    //     return view('Frontend.Pages.list-comment', compact('comment'));
    // }

}
