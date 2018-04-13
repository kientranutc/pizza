<?php
namespace App\Repositories\ShoppingCart;
use App\Models\Product;

/**
 * Class ShoppingCartRepository
 * @package App\Repositories\ShoppingCart
 */
class  ShoppingCartRepository implements ShoppingCartRepositoryInterface
{
    public function addCart($id)
    {
        $product = Product::find($id);
        \Cart::add(['id' =>$id , 'name' => $product->name, 'qty' =>1, 'price' => $product->price, 'options' => ['image' => $product->image,'sale'=>$product->sale]]);
    }

    public function updateCart($id)
    {

    }

    public function deleteCart($id)
    {

    }

    public function showCart()
    {

    }
}
?>