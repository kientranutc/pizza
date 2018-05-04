<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);



    public function  getBlogActive();

}