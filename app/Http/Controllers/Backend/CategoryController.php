<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    /**
     *
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories=$categories;

    }
    /**
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $stt=0;
        $data = $this->categories->all();
        return view('backend.category.index', compact('stt','data'));
    }
    /**
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('backend.category.create');
    }
    /**
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCreate(CreateCategoryRequest $request)
    {
        $this->categories->save( $request->except('_token'));
        return redirect()->route('category.index')->with('success','Thêm mới danh mục thành công!');
    }
    /**
     *
     * @param unknown $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $data = $this->categories->find($id);
        return view('backend.category.edit', compact('data'));
    }
    /**
     * @todo process edit category
     * @param integer $id
     * @param UpdateCategoryRequest $request
     */
    public function processEdit($id,UpdateCategoryRequest $request)
    {
        if ($this->categories->checkNameExist($id, $request->get('name'))) {
            return redirect()->back()->withErrors('Tên danh mục đã tồn tại!');
        } else {
            if ($this->categories->update($id, $request->except('_token'))) {
                return redirect()->route('cateory.index')->with('success','Cập nhật danh mục thành công!');
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật danh mục!');
            }
        }
    }
    public function delete($id)
    {
        if ($this->categories->delete($id)) {
            return redirect()->route('category.index')->with('success','Xóa danh mục thành công!');
        } else {
            return redirect()->route('category.index')->withErrors('Lỗi xóa danh mục!');
        }
    }


}
