<?php
namespace App\Repositories\Banner;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class  BannerRepository implements BannerRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return Banner::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Banner::find($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function save($data)
    {
        $banner  = new Banner();
        if (isset($data['title'])) {
            $banner->title = $data['title'];
        } else {
            $banner->title = '';
        }
        if (isset($data['image'])) {
            $banner->image = $data['image'];
        } else {
            $banner->image = '';
        }
        if (isset($data['url'])) {
            $banner->url = $data['url'];
        } else {
            $banner->url = '';
        }
        if (isset($data['status'])) {
            $banner->status = $data['status'];
        } else {
            $banner->status = 1;
        }
        return $banner->save();
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id,$data)
    {
        $banner = Banner::find($id);
        if ($banner) {
            if (isset($data['title'])) {
                $banner->title = $data['title'];
            } else {
                $banner->title = '';
            }
            if (isset($data['image'])) {
                $banner->image = $data['image'];
            } else {
                $banner->image = '';
            }
            if (isset($data['url'])) {
                $banner->url = $data['url'];
            } else {
                $banner->url = '';
            }
            if (isset($data['status'])) {
                $banner->status = $data['status'];
            } else {
                $banner->status = 1;
            }
            return $banner->save();
        } else {
            return false;
        }

    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            return $banner->delete();
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $name
     * @return mixed
     */
    public function checkNameExist($id, $name)
    {
        return Banner::where('id', '<>', $id)
            ->where('title', $name)
            ->count();
    }
    public function getBannerActive()
    {
        return Banner::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get()->toArray();
    }
}