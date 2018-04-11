<?php
namespace App\Repositories\OrderDetail;

interface OrderDetailRepositoryInterface
{
    public function all($id);

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

}