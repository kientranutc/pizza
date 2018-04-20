<?php

namespace App\Http\ViewComposers;

use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\View\View;

class ViewDataComposers
{
    /**
     * The repository implementation.
     *
     */
    protected $category;
    protected  $banner;
    protected $comment;
    protected $order;
    /**
     * Create a new view  composer.
     *
     * @return void
     */

    public function __construct(CategoryRepositoryInterface $category, BannerRepositoryInterface $banner,
                                CommentRepositoryInterface $comment, OrderRepositoryInterface $order)
    {
        $this->category = $category;
        $this->banner = $banner;
        $this->comment = $comment;
        $this->order = $order;
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
        $countCommentDayNow = $this->comment->countCommentDayNow ();
        $countOrderDayNow = $this->order->countOrderDayNow ();
        $view->with(
            [
                'category'=> $dataCategory,
                'banner' => $dataBanner,
                'countComment' => $countCommentDayNow,
                'countOrder' => $countOrderDayNow

            ]);

    }
}