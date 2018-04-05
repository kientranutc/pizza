<?php
namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

}