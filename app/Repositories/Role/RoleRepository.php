<?php
namespace App\Repositories\Role;
use App\Models\Role;

class  RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function find($id)
    {

    }

    public function save($data)
    {

    }

    public function update($id,$data)
    {

    }

    public function delete($id)
    {

    }

    public function checkNameExist($id,$name)
    {

    }
}
