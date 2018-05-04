<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    /**
     * NewsController constructor.
     * @param NewsRepositoryInterface $news
     */
    public function __construct(NewsRepositoryInterface $news)
    {
        $this ->news = $news;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  index()
    {
        $data = $this->news->all();
        $stt = 0;
        return view('backend.news.index', compact('stt', 'data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  create()
    {
        return view('backend.news.create');
    }

    /**
     * @param Requests\CreateNewsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCreate(Requests\CreateNewsRequest $request)
    {
        $this->news->save( $request->except('_token'));
        return redirect()->route('news.index')->with('success','Thêm mới khuyến mại thành công!');
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $data = $this->news->find($id);
        return view('backend.news.edit', compact('data'));
    }

    /**
     * @param $id
     * @param Requests\UpdateNewsRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function processEdit($id, Requests\UpdateNewsRequest $request)
    {
        if ($this->news->checkNameExist($id, $request->get('title'))>0) {
            return redirect()->back()->withErrors('Tiêu đề khuyến mại đã tồn tại!');
        } else {
            if ($this->news->update($id, $request->except('_token'))) {
                return redirect()->route('news.index')->with('success','Cập nhật khuyến mại thành công!');
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật khuyến mại!');
            }
        }
    }
    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if ($this->news->delete($id)) {
            return redirect()->route('news.index')->with('success','Xóa tin khuyến mại thành công!');
        } else {
            return redirect()->route('news.index')->withErrors('Lỗi xóa tin khuyến mại!');
        }
    }
}
