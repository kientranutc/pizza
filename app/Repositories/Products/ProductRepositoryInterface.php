<?php
namespace App\Repositories\Products;

interface ProductRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);

    public function getListWish($flag);

    public function findAttribute($att, $value);

    public function getProductStar();

    public function getProductNoOrder($startdate, $endDate);
}