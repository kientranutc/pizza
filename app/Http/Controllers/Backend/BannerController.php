<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Banner\BannerRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * BannerController constructor.
     * @param BannerRepositoryInterface $banner
     */
    public function  __construct(BannerRepositoryInterface $banner)
    {
        $this->banner = $banner;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->banner->all();
        $stt = 0;
        return view('backend.banner.index', compact('stt', 'data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * @param Requests\CreateBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCreate(Requests\CreateBannerRequest $request)
    {
        $this->banner->save( $request->except('_token'));
        return redirect()->back()->with('success','Thêm mới banner thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data = $this->banner->find($id);
        return view('backend.banner.edit', compact('data'));
    }

    /**
     * @param $id
     * @param Requests\UpdateBannerRequest $request
     */
    public function  processEdit($id, Requests\UpdateBannerRequest $request)
    {
        if ($this->banner->checkNameExist($id, $request->get('title'))>0) {
            return redirect()->back()->withErrors('Tiêu đề banner đã tồn tại!');
        } else {
            if ($this->banner->update($id, $request->except('_token'))) {
                return redirect()->route('banner.index')->with('success','Cập nhật banner thành công!');
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật banner!');
            }
        }
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if ($this->banner->delete($id)) {
            return redirect()->route('banner.index')->with('success','Xóa banner thành công!');
        } else {
            return redirect()->route('banner.index')->withErrors('Lỗi xóa banner!');
        }
    }
}
