<?php
namespace App\Repositories\ShoppingCart;

interface ShoppingCartRepositoryInterface
{
    public function addCart($id);

    public function updateCart($id, $qty);

    public function deleteCart($id);

    public function showCart();
}