<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index($slug)
    {
        $dataCategory = $this->category->getListProductForCategory($slug);
        $categoryTitle = $this->category->findAttribute('slug', $slug);
        return view('frontend.category', compact('dataCategory', 'categoryTitle'));
    }
}
