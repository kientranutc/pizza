<?php
namespace App\Repositories\Comment;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class  CommentRepository implements CommentRepositoryInterface
{
    public function all()
    {
        return Comment::all();
    }

    public function find($id)
    {
        return Comment::find($id);
    }

    public function save($data)
    {
        $comment = new Comment();
        if (isset($data['product_id'])) {
           $comment->product_id =  $data['product_id'];
        } else {
            $comment->product_id = 0;
        }
        if (isset($data['user_id'])) {
            $comment->user_id =  $data['user_id'];
        } else {
            $comment->user_id = 0;
        }
        if (isset($data['content'])) {
            $comment->content =  $data['content'];
        } else {
            $comment->content = 0;
        }
        if (isset($data['status'])) {
            $comment->status =  $data['status'];
        } else {
            $comment->status = 1;
        }
        $comment->save();
    }

    public function update($id, $data)
    {

    }
    public function getListComment($productId)
    {
        $limit = 20;
        return Comment::select('comment.*', 'customer.username as customer_name')
                        ->join('customer', 'customer.id', '=', 'comment.user_id')
                        ->where('comment.product_id', $productId)
                        ->orderBy('comment.created_at', 'DESC')
                        ->take($limit)->get();
    }
}