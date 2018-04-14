<?php
namespace App\Repositories\RateProduct;

interface RateProductRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

}