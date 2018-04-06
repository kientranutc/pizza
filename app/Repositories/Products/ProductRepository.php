<?php
namespace App\Repositories\Products;
use App\Models\Product;

class  ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::select('products.*','categories.name as category_name', 'users.fullname as fullname')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id_create')
            ->orderBy('products.id', 'DESC')
            ->get();
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function save($data)
    {
        $product = new Product();
        if (isset($data['name'])) {
            $product->name = $data['name'];
            $product->slug = str_slug($data['name'],'-');
        } else {
            $product->name = '';
            $product->slug = '';
        }
        if (isset($data['image'])) {
            $product->image = $data['image'];
        } else {
            $product->image = '';
        }
        if (isset($data['price'])) {
            $product->price = $data['price'];
        } else {
            $product->price = 0;
        }
        if (isset($data['sale'])) {
            $product->sale = $data['sale'];
        } else {
            $product->sale = 0;
        }
        if (isset($data['description'])) {
            $product->description = $data['description'];
        } else {
            $product->description = '';
        }
        if (isset($data['category_id'])) {
            $product->category_id = $data['category_id'];
        }
        if (isset($data['status'])) {
            $product->status = $data['status'];
        } else {
            $product->status = 1;
        }
        $product->save();

    }

    public function update($id, $data)
    {
        $product = Product::find($id);
        if ($product) {
            if (isset($data['name'])) {
                $product->name = $data['name'];
                $product->slug = str_slug($data['name'],'-');
            } else {
                $product->name = '';
                $product->slug = '';
            }
            if (isset($data['image'])) {
                $product->image = $data['image'];
            } else {
                $product->image = '';
            }
            if (isset($data['price'])) {
                $product->price = $data['price'];
            } else {
                $product->price = 0;
            }
            if (isset($data['sale'])) {
                $product->sale = $data['sale'];
            } else {
                $product->sale = 0;
            }
            if (isset($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = '';
            }
            if (isset($data['category_id'])) {
                $product->category_id = $data['category_id'];
            }
            if (isset($data['status'])) {
                $product->status = $data['status'];
            } else {
                $product->status = 1;
            }
            return $product->save();
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        } else {
            return false;
        }
    }

    public function checkNameExist($id, $name)
    {
        return Product::where('id', '<>', $id)
                        ->where('name', $name)
                        ->count();
    }

}
?>