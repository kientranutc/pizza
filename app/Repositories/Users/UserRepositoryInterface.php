<?php
namespace App\Repositories\Users;

interface UserRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);

    public function lockAndUnlock($id, $active);

    public function checkEmailAndActiveAccount($email);

    public function checkAccountActive($email);

}
?>