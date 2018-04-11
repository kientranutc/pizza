<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UpdateProductRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests\CreateProductRequest;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public  function  __construct(ProductRepositoryInterface  $product, CategoryRepositoryInterface $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $data = $this->product->all();
        $stt = 0;
        return view('backend.product.index', compact('stt','data'));
    }

    public function  create()
    {
        $category = $this->category->getCategoryActive();
        return view('backend.product.create', compact('category'));
    }

    public function processCreate(CreateProductRequest $request)
    {
        $this->product->save( $request->except('_token'));
        return redirect()->route('product.index')->with('success','Thêm mới sản phẩm thành công!');
    }

    public function  edit($id)
    {
        $category = $this->category->getCategoryActive();
        $dataProduct = $this->product->find($id);
        return view('backend.product.edit', compact('category', 'dataProduct'));
    }
    public function processEdit($id,UpdateProductRequest $request)
    {
        if ($this->product->checkNameExist($id, $request->get('name'))>0) {
            return redirect()->back()->withErrors('Tên sản phẩm đã tồn tại!');
        } else {
            if ($this->product->update($id, $request->except('_token'))) {
                return redirect()->route('product.index')->with('success','Cập nhật sản phẩm thành công!');
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật sản phẩm!');
            }
        }
    }
    public function delete($id)
    {
        if ($this->product->delete($id)) {
            return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công!');
        } else {
            return redirect()->route('product.index')->withErrors('Lỗi xóa sản phẩm!');
        }
    }
}
