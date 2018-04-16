<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function  __construct(CommentRepositoryInterface $comment)
    {
        $this->comment = $comment;
    }

    public function index(Request $request)
    {
        $this->comment->save($request->all());
        return redirect()->back()->with('success', 'Bạn đã bình luận !');
    }
}
