<?php
namespace App\Repositories\Categories;
use App\Models\Category;

class  CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }
    public function find($id)
    {
        return Category::find($id);
    }

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

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }

}