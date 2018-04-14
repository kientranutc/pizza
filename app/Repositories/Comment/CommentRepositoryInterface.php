<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function getListComment($productId);
}