<?php

namespace src\controller;

use Flight;
use src\model\UserModel;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create()
    {
        $request = Flight::request()->data;

        /** Trata dados da request */
        $data = array(
            "name" => $request['name'],
            "email" => $request['email'],
            "age" => $request['age'],
        );

        /** Salva usuario */
        $id = $this->userModel->createUser($data);

        /** Busca dados do usuario salvo e retorna na requisicao em formato json*/
        return Flight::json($this->userModel->getUser($id));
    }


    public function list()
    {
        /** Busca dados de todos usuarios salvo e retorna na requisicao em formato json*/
        return Flight::json($this->userModel->getUsers());
    }


    public function update($id)
    {
        $request = Flight::request()->data;

        /** Trata dados da request */
        $data = array(
            "name" => $request['name'],
            "email" => $request['email'],
            "age" => $request['age'],
        );

        /** Edita usuario */
        $this->userModel->updateUser($data, "id = $id");

        /** Busca dados do usuario salvo e retorna na requisicao em formato json*/
        return Flight::json($this->userModel->getUser($id));
    }

    public function delete($id)
    {
        /** Deleta usuario */
        $this->userModel->deleteUser("id = $id");

        /** Busca dados de todos usuarios salvo e retorna na requisicao em formato json*/
        return Flight::json("Usuário removido com sucesso");
    }
}
