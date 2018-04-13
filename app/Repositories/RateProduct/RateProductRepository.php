<?php
namespace App\Repositories\RateProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\RateProduct;

/**
 * Class RateProductRepository
 * @package App\Repositories\Products
 */
class  RateProductRepository implements RateProductRepositoryInterface
{
    public function all()
    {

    }

    public function find($id)
    {
    }

    public function save($data)
    {
        $rateproduct = new RateProduct();
        if (isset($data['product_id'])) {
            $rateproduct->product_id = $data['product_id'];
        }
        if (isset($data['ip_address'])) {
            $rateproduct->ip_address = getHostByName(getHostName());
        }
        if (isset($data['rate_number'])) {
            $rateproduct->rate_number = $data['rate_number'];
        }
        if (isset($data['date_create'])) {
            $rateproduct->date_create = Carbon::now()->toDateString();
        }
        $rateproduct->save();
    }

    public function update($id, $data)
    {

    }
}