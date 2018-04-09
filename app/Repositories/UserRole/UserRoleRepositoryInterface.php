<?php
namespace App\Repositories\UserRole;

interface UserRoleRepositoryInterface
{
    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);
}
?>