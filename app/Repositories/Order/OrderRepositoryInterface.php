<?php
namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function changeStatusOrder($id, $status);

    public function countOrderDayNow();

    public function getMoneyOrder();

}