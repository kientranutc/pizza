<?php
namespace App\Repositories\UserRole;
use App\Models\UserRole;

class  UserRoleRepository implements UserRoleRepositoryInterface
{

    public function find($id)
    {
        return UserRole::where('user_id', $id)->first();
    }

    public function save($data)
    {
        $userRole = new UserRole();
        if (isset($data['user_id'])) {
            $userRole->user_id = $data['user_id'];
        } else {
            $userRole->user_id = 0;
        }
        if (isset($data['role_id'])) {
            $userRole->role_id = $data['role_id'];
        }
        return $userRole->save();

    }

    public function update($id,$data)
    {
        $userRole = UserRole::where('user_id',$id);
        if ($userRole) {
            if (isset($data['role_id'])) {
                $userRole->role_id = $data['role_id'];
            }
            return $userRole->update($data);
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $userRole = UserRole::where('user_id', $id);
        if ($userRole) {
            return $userRole->delete();
        } else {
            return false;
        }

    }

    public function checkNameExist($id,$name)
    {

    }
}
?>