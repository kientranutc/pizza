<?php
namespace App\Repositories\Products;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use DB;

/**
 * Class ProductRepository
 * @package App\Repositories\Products
 */
class  ProductRepository implements ProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all()
    {
        return Product::select('products.*','categories.name as category_name', 'users.fullname as fullname')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id_create')
            ->orderBy('products.id', 'DESC')
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Product::find($id);
    }

    /**
     * @param $data
     */
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

    /**
     * @param $id
     * @param $data
     * @return bool
     */
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

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            return $product->delete();
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $name
     * @return mixed
     */
    public function checkNameExist($id, $name)
    {
        return Product::where('id', '<>', $id)
                        ->where('name', $name)
                        ->count();
    }
    /**
     * @todo get list product wishest
     * @return mixed
     */
    public function getListWish($flag)
    {
        $limit = 20;
        $query='';

       if($flag == 1){
            $query = Product::select(DB::raw('products.*, sum(rate_product.rate_number)'))
                               ->join('rate_product', 'rate_product.product_id', '=', 'products.id')
                               ->where('products.status',1)
                               ->groupBy('rate_product.product_id')
                               ->orderBy(DB::raw('sum(rate_product.rate_number)'), 'DESC')
                               ->get()->take(8);

       } else {
           $query = Product::select(DB::raw('products.*, sum(rate_product.rate_number)'))
               ->join('rate_product', 'rate_product.product_id', '=', 'products.id')
               ->where('products.status',1)
               ->groupBy('rate_product.product_id')
               ->orderBy(DB::raw('sum(rate_product.rate_number)'), 'DESC')
               ->paginate($limit);
        }
        return $query;
    }

    public function findAttribute($att, $value)
    {
        return Product::where($att, $value)->first();
    }

    public function getProductStar()
    {
        return Product::select(DB::raw('products.*, sum(rate_product.rate_number) as sum_star'))
            ->join('rate_product', 'rate_product.product_id', '=', 'products.id')
            ->where('products.status',1)
            ->groupBy('rate_product.product_id')
            ->orderBy(DB::raw('sum(rate_product.rate_number)'), 'DESC')
            ->get();
    }
}
?>