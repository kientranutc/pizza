<?php
namespace App\Repositories\News;

interface NewsRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function checkNameExist($id,$name);

    public function getService($flag, $limit);

    public function  getServiceForType($type);

}