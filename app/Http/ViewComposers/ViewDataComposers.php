<?php

namespace App\Http\ViewComposers;

use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\View\View;

class ViewDataComposers
{
    /**
     * The repository implementation.
     *
     */
    protected $category;
    protected  $banner;
    /**
     * Create a new view  composer.
     *
     * @return void
     */

    public function __construct(CategoryRepositoryInterface $category, BannerRepositoryInterface $banner)
    {
        $this->category = $category;
        $this->banner = $banner;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $dataCategory = $this->category->getCategoryActive();
        $dataBanner = $this->banner->getBannerActive();
        $view->with(
            [
                'category'=> $dataCategory,
                'banner' => $dataBanner
            ]);

    }
}