<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function __construct(BlogRepositoryInterface $blog)
    {
        $this-> blog = $blog;
    }

    public function index()
    {
        $data = $this->blog->all();
        $stt = 0;
        return view('backend.blog.index', compact('stt', 'data'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  create()
    {
        return view('backend.blog.create');
    }

    /**
     * @param Requests\CreateBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCreate(Requests\CreateBlogRequest $request)
    {
        $this->blog->save( $request->except('_token'));
        return redirect()->route('blog.index')->with('success','Thêm mới blog thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->blog->find($id);
        return view('backend.blog.edit', compact('data'));
    }

    /**
     * @param $id
     * @param Requests\UpdateBlogRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function processEdit($id,Requests\UpdateBlogRequest $request)
    {
        if ($this->blog->checkNameExist($id, $request->get('title'))>0) {
            return redirect()->back()->withErrors('Tiêu đề blog đã tồn tại!');
        } else {
            if ($this->blog->update($id, $request->except('_token'))) {
                return redirect()->route('blog.index')->with('success','Cập nhật blog thành công!');
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật blog!');
            }
        }
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if ($this->blog->delete($id)) {
            return redirect()->route('blog.index')->with('success','Xóa blog thành công!');
        } else {
            return redirect()->route('blog.index')->withErrors('Lỗi xóa blog!');
        }
    }

}
