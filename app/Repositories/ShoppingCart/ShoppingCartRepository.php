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
        \Cart::add(['id' =>$id , 'name' => $product->name, 'qty' =>1,'price'=>($product->sale>0)?($product->price*(1-$product->sale/100)):$product->price, 'options' => ['image' => $product->image,'price_unsale' => $product->price,'sale'=>$product->sale]]);
    }

    public function updateCart($id, $qty)
    {
        \Cart::update($id, $qty);
    }

    public function deleteCart($id)
    {
        \Cart::remove($id);
    }

    public function showCart()
    {
        return \Cart::content();
    }
}
?>