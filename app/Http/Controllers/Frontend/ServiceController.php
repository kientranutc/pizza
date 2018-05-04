<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function  __construct(NewsRepositoryInterface $news, BlogRepositoryInterface $blog)
    {
        $this->news = $news;
        $this->blog = $blog;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  index(Request $request)
    {
        $type = $request->get('type');
        if ($type == 1) {
            $dataService = $this->news->getNewsActive();
        } else {
            $dataService = $this->blog->getBlogActive();
        }

        return view('frontend.service', compact('dataService'));
    }

    public function showDetail($type, $slug)
    {
        if ($type == 1) {
            $dataServiceDetail = $this->news->findAttribute('slug', $slug);
        } else {
            $dataServiceDetail = $this->blog->findAttribute('slug', $slug);
        }
        return view('frontend.service_detail', compact('type', 'dataServiceDetail'));
    }


}
