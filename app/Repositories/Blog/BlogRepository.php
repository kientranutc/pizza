<?php
namespace App\Repositories\Blog;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class  BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return  Blog::orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return Blog::find($id);
    }

    public function save($data)
    {
        $blog = new Blog();
        if (isset($data['title'])) {
            $blog->title = $data['title'];
            $blog->slug = str_slug($data['title'],'-');
        } else {
            $blog->title = '';
            $blog->slug = '';
        }
        if (isset($data['image'])) {
            $blog->image = $data['image'];
        } else {
            $blog->image = '';
        }
        if (isset($data['status'])) {
            $blog->status = $data['status'];
        } else {
            $blog->status = 1;
        }
        if (isset($data['description'])) {
            $blog->description = $data['description'];
        } else {
            $blog->description = '';
        }

        $blog->user_create = Auth::user()->name;
        $blog->save();
    }

    public function update($id,$data)
    {
        $blog = Blog::find($id);
        if ($blog) {
            if (isset($data['title'])) {
                $blog->title = $data['title'];
                $blog->slug = str_slug($data['title'],'-');
            } else {
                $blog->title = '';
                $blog->slug = '';
            }
            if (isset($data['image'])) {
                $blog->image = $data['image'];
            } else {
                $blog->image = '';
            }
            if (isset($data['status'])) {
                $blog->status = $data['status'];
            } else {
                $blog->status = 1;
            }
            if (isset($data['description'])) {
                $blog->description = $data['description'];
            } else {
                $blog->description = '';
            }

            $blog->user_create = Auth::user()->name;
            return $blog->save();
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            return $blog->delete();
        } else {
            return false;
        }
    }

    public function checkNameExist($id, $name)
    {
        return Blog::where('id', '<>', $id)
            ->where('title', $name)
            ->count();
    }


    public function  getBlogActive()
    {
        $limit = 20;
        return Blog::where('status',1)
                    ->orderBy('created_at', 'DESC')
                    ->paginate($limit);
    }

    public function findAttribute($att, $value)
    {
        return Blog::where($att, $value)->first();
    }

}