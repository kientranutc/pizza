<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function  __construct(NewsRepositoryInterface $news)
    {
        $this->news = $news;
    }

    public function  index(Request $request)
    {
        $type = $request->get('type');
        $dataService = $this->news->getServiceForType($type);
        return view('frontend.service', compact('dataService'));
    }
}
