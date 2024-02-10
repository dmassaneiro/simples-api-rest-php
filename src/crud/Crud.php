<?php

namespace src\crud;

use src\connection\Mysql;

class Crud extends Mysql
{
    /** Metodo generico para gravar um registro */
    public function create($tabela, $dados)
    {
        $colunas = array_keys($dados);
        $posicoes = array_pad([], count($dados), '?');

        $query = 'insert into ' . $this->schema . $tabela . ' (' . implode(',', $colunas) . ') values (' . implode(',', $posicoes) . ')';

        try {
            $statement = $this->getConexao()->prepare($query);
            $statement->execute(array_values($dados));
            return  $this->getConexao()->lastInsertId();
        } catch (\PDOException $e) {
            die('ERRO ' . $e);
        }
    }

    /** Metodo generico para editar um registro */
    public function update($tabela, $dados, $where)
    {
        $colunas = array_keys($dados);

        $query = 'update ' . $this->schema . $tabela . ' set ' . implode('=?,', $colunas) . '=? where ' . $where;
        try {
            $statement = $this->getConexao()->prepare($query);
            $statement->execute(array_values($dados));
            return true;
        } catch (\PDOException $e) {
            die('ERRO ' . $e);
        }
    }
    
    /** Metodo generico para deletar um registro */
    public function delete($tabela, $where)
    {

        $query = 'delete from  ' . $this->schema . $tabela . ' where ' . $where;
        try {
            $statement = $this->getConexao()->prepare($query);
            $statement->execute();
            return true;
        } catch (\PDOException $e) {            
            die('ERRO ' . $e);
        }
    }

    /** Metodo generico para buscar todos os registros */
    public function readAll($tabela, $where = null, $order = null, $limit = null, $colunas = '*')
    {
        $where = strlen($where) ? 'where ' . $where : '';
        $order = strlen($order) ? 'order by ' . $order : '';
        $limit = strlen($limit) ? 'limit ' . $limit : '';

        $query = 'select ' . $colunas . ' from ' . $this->schema . $tabela . ' ' . $where . ' ' . $order . ' ' . $limit;

        try {
            $statement = $this->getConexao()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            die('ERRO ' . $e);
        }
    }

    /** Metodo generico para buscar apenas um registro */
    public function readOne($tabela, $where = null, $colunas = '*')
    {
        $where = strlen($where) ? 'where ' . $where : '';

        $query = 'select ' . $colunas . ' from ' . $this->schema . $tabela . ' ' . $where;

        try {
            $statement = $this->getConexao()->prepare($query);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_OBJ);
            return $result;
        } catch (\PDOException $e) {
            die('ERRO ' . $e);
        }
    }
}
