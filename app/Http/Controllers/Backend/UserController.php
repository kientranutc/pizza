<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\UserRole\UserRoleRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * UserController constructor.
     * @param UserRepositoryInterface $user
     * @param UserRoleRepositoryInterface $userRole
     * @param RoleRepositoryInterface $role
     */
    public function __construct(UserRepositoryInterface $user, UserRoleRepositoryInterface $userRole, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->userRole = $userRole;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function  index()
    {
        $stt = 0;
        $data =  $this->user->all();
        return view('backend.users.index', compact('stt', 'data'));
    }

    /**
     * @param $id
     * @param $active
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLockAndUnlock($id, $active)
    {
        $this->user->lockAndUnlock($id, $active);
        return redirect()->back()->with('success', 'Thay đổi thành công');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $role = $this->role->all();
        return view('backend.users.create', compact('role'));
    }
    /**
     * @param Requests\CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCreate(Requests\CreateUserRequest $request)
    {
        $dataUser = $request->except(['_token', 'role_id']);
        $roleId = $request->get('role_id');
        $userId = $this->user->save($dataUser);

        $this->userRole->save(
            [
                'user_id' => $userId,
                'role_id' => $roleId
            ]
        );
        return redirect()->route('user.index')->with('success','Thêm người dùng thành công!');
    }
    /**
     * @param $id
     */
    public function edit($id)
    {
        $dataUser = $this->user->find($id);
        $role = $this->role->all();
        $currentRole = $this->userRole->find($id)->role_id;
        return view('backend.users.edit', compact('dataUser', 'role', 'currentRole'));
    }

    /**
     * @param $id
     * @param Requests\UpdateUserRequest $request
     */
    public function processEdit($id, Requests\UpdateUserRequest $request)
    {
        $currentPassword = $request->get('current_password');
        $roleId = $request->get('role_id');
        if (Hash::check($currentPassword, Auth::user()->password)) {
            $dataUser = $request->except(['_token', 'role_id', 'c_password', 'current_password']);
            if ($this->user->update($id, $dataUser)) {
                if ($this->userRole->update($id, [
                    'role_id' => $roleId
                ])) {
                    return redirect()->route('user.index')->with('success','Cập nhật người dùng thành công!');
                } else {
                    return redirect()->back()->withErrors('Lỗi cập nhật quyền');
                }
            } else {
                return redirect()->back()->withErrors('Lỗi cập nhật người dùng');
            }
        } else {
            return redirect()->back()->withErrors('Mật khẩu hiện tại người dùng không đúng!');
        }
    }

    /**
     * @param $id
     */
    public function  delete($id)
    {

        if ($this->user->delete($id)) {
            if($this->userRole->delete($id)){
                return redirect()->route('user.index')->with('success','Xóa người dùng thành công!');
            } else {
                return redirect()->route('user.index')->withErrors('Lỗi người dùng thành công!');
            }
        } else {
            return redirect()->route('user.index')->withErrors('Lỗi người dùng thành công!');
        }
    }



}
