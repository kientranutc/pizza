<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\RateProduct\RateProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RateStarController extends Controller
{
    public function __construct(RateProductRepositoryInterface $rateProduct)
    {
        $this->rateProduct = $rateProduct;
    }

    public function create(Request $request)
    {
        $this->rateProduct->save($request->all());
        return response()->json(['msg'=>'add rate star succes']);
    }
}
