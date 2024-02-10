<?php
include_once("./vendor/autoload.php");

use src\controller\UserController;

$controller = new UserController;

/** Criar Usuarios **/
Flight::route('POST /user', array($controller, "create"));

/** Listar Usuarios **/
Flight::route('GET /users', array($controller, "list"));

/** Editar Usuario **/
Flight::route('PUT /user/@id', array($controller, "update"));

/** Deletar Usuario **/
Flight::route('DELETE /user/@id', array($controller, "delete"));

Flight::start();
