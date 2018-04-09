<?php
namespace App\Repositories\Users;
use App\Models\User;
use App\Models\UserRole;

class  UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        return UserRole::select('users.*','role.name as role_name')
                    ->join('users', 'users.id', '=', 'user_role.user_id')
                    ->join('role', 'role.id', '=', 'user_role.role_id')
                    ->get();
    }
    public function find($id)
    {
        return User::find($id);
    }

    public function save($data)
    {
        $user =  new User();
        if (isset($data['name'])) {
            $user->name = $data['name'];
        } else {
            $user->name = '';
        }
        if (isset($data['image'])) {
            $user->image = $data['image'];
        } else {
            $user->image = '';
        }
        if (isset($data['fullname'])) {
            $user->fullname = $data['fullname'];
        } else {
            $user->fullname = '';
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        } else {
            $user->email = '';
        }
        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        } else {
            $user->password = '';
        }
        $user->active = 0;
        $user->is_admin = 0;
        $user->save();
        return $user->id;
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        $user =  User::find($id);
        if ($user) {
            if (isset($data['image'])) {
                $user->image = $data['image'];
            } else {
                $user->image = '';
            }
            if (isset($data['fullname'])) {
                $user->fullname = $data['fullname'];
            } else {
                $user->fullname = '';
            }
            if (isset($data['password']) &&$data['password'] != '') {
                $user->password = bcrypt($data['password']);
            }

            return $user->save();
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        } else {
            return false;
        }
    }

    public function checkNameExist($id,$name)
    {

    }

    public function lockAndUnlock($id, $active)
    {
        $user = User::find($id);
        if ($active == 1) {
            $user->active = 0;
        } else {
            $user->active = 1;
        }
        return $user->save();
    }

    public function checkEmailAndActiveAccount($email)
    {
        return User::where('email', $email)->first();
    }
}
?>