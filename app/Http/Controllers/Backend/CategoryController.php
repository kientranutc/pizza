<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;


class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $categories

        )
    {
        $this->categories=$categories;

    }
    public function index()
    {
        return view('backend.category.index');
    }
    public function create()
    {
        return view('backend.category.create');
    }
    public function processCreate(CreateCategoryRequest $request)
    {
        $this->categories->save( $request->except('_token'));
        return redirect()->route('category.index')->with('success','Thêm mới danh mục thành công!');
    }
}
