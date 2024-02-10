<?php 

namespace src\model;
use src\crud\Crud;

class UserModel extends Crud{
    private $table = 'tb_user';

    public function createUser($dados)
    {
        return $this->create($this->table, $dados);;
    }
    public function updateUser($dados, $where)
    {
        return $this->update($this->table, $dados, $where);
    }

    public function deleteUser($where)
    {
        return $this->delete($this->table, $where);;
    }

    public function getUsers()
    {
        return $this->readAll($this->table);
    }

    public function getUser($id)
    {
        return $this->readOne($this->table, "id = $id");
    }


}
