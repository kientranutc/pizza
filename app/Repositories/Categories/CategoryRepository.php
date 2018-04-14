<?php
namespace App\Repositories\Categories;
use App\Models\Category;

class  CategoryRepository implements CategoryRepositoryInterface
{
    /**
     *
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::all()
     */
    public function all()
    {
        return Category::orderBy('id','DESC')->get();
    }
    /**
     *
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::find()
     */
    public function find($id)
    {
        return Category::find($id);
    }
    /**
     *
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::save()
     */
    public function save($data)
    {
        $category = new Category();
        if (isset($data['name'])) {
            $category->name = $data['name'];
            $category->slug = str_slug($data['name'], '-');
        } else {
            $category->name = '';
            $category->slug = '';
        }
        if (isset($data['active'])) {
            $category->active = $data['active'];
        } else {
            $category->active = 1;
        }
        $category->save();
    }
    /**
     *
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::update()
     */
    public function update($id,$data)
    {
        $category = Category::find($id);
        if ($category) {
            if (isset($data['name'])) {
                $category->name = $data['name'];
                $category->slug = str_slug($data['name'], '-');
            } else {
                $category->name = '';
                $category->slug = '';
            }
            if (isset($data['active'])) {
                $category->active = 1;
            } else {
                $category->active = 0;
            }
                return $category->save();
        }
        else {
                return false;
        }
    }
    /**
     * @todo delete category
     * @param integer $id
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::delete()
     */
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) {
            return $category->delete();
        } else {
            return false;
        }
    }
    /**
     * @todo check name category exits;
     * @param integer $id
     * @param string $name
     * {@inheritDoc}
     * @see \App\Repositories\Categories\CategoryRepositoryInterface::checkNameExist()
     */
    public function checkNameExist($id,$name)
    {
       return Category::where('id', '<>', $id)
                      ->where('name', $name)
                      ->count();
    }

    /**
     * @return mixed
     */
    public function getCategoryActive()
    {
        return Category::where('active',1)
            ->get();
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getListProductForCategory($slug)
    {
        $limit = 20 ;
        return Category::select('products.*')
                        ->join('products','products.category_id', '=', 'categories.id')
                        ->where('products.status', '=', 1)
                        ->where('categories.slug', $slug)
                        ->orderBy('products.id', 'DESC')
                        ->paginate($limit);
    }
    public function findAttribute($att, $value)
    {
        return Category::where($att, $value)->first();
    }

}