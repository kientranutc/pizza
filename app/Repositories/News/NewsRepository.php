<?php
namespace App\Repositories\News;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class  NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return  News::orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function save($data)
    {
        $news = new News();
        if (isset($data['title'])) {
            $news->title = $data['title'];
            $news->slug = str_slug($data['title'],'-');
        } else {
            $news->title = '';
            $news->slug = '';
        }
        if (isset($data['image'])) {
            $news->image = $data['image'];
        } else {
            $news->image = '';
        }
        if (isset($data['status'])) {
            $news->status = $data['status'];
        } else {
            $news->status = 1;
        }
        if (isset($data['description'])) {
            $news->description = $data['description'];
        } else {
            $news->description = '';
        }
        $news->user_create = Auth::user()->name;
        $news->save();
    }

    public function update($id,$data)
    {
        $news = News::find($id);
        if ($news) {
            if (isset($data['title'])) {
                $news->title = $data['title'];
                $news->slug = str_slug($data['title'],'-');
            } else {
                $news->title = '';
                $news->slug = '';
            }
            if (isset($data['image'])) {
                $news->image = $data['image'];
            } else {
                $news->image = '';
            }
            if (isset($data['status'])) {
                $news->status = $data['status'];
            } else {
                $news->status = 1;
            }
            if (isset($data['description'])) {
                $news->description = $data['description'];
            } else {
                $news->description = '';
            }

            $news->user_update = Auth::user()->name;
            return $news->save();
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $news = News::find($id);
        if ($news) {
            return $news->delete();
        } else {
            return false;
        }
    }

    public function checkNameExist($id, $name)
    {
        return News::where('id', '<>', $id)
            ->where('title', $name)
            ->count();
    }

    public function getService($limit)
    {
        return News::where('status', 1)
                    ->take($limit)->get();
    }
    public function  getNewsActive()
    {
        $limit = 20;
        return News::where('status',1)
                    ->orderBy('created_at', 'DESC')
                    ->paginate($limit);
    }

    public function findAttribute($att, $value)
    {
        return News::where($att, $value)->first();
    }
}