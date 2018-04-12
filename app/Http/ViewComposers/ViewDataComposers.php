<?php

namespace App\Http\ViewComposers;

use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\View\View;

class ViewDataComposers
{
    /**
     * The repository implementation.
     *
     */
    protected $category;
    /**
     * Create a new view  composer.
     *
     * @return void
     */

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
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
        $view->with('category', $dataCategory);

    }
}