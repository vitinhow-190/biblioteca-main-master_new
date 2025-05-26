<?php

namespace App\DAO;

use App\Model\Usuario;

final class UsuarioDAO extends DAO{
    public function _construct(){
        parent::_construct();
    }

    public function save(Usuario $model) : Usuario{
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Usuario $model) : Usuario{
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?,) ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Email);
        $stmt->bindValue(3, $model->Senha);
        $stmt->execute();
        $model->Id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Usuario $model) : Usuario{
        $sql = "UPDATE usuario SET nome=?, email=?, senha=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Email);
        $stmt->bindValue(3, $model->Senha);
        $stmt->bindValue(4, $model->Id);
        $stmt->execute();
        
        return $model;
    }

    public function selectById(int $id) : ?Usuario{
        $sql = "SELECT * FROM usuario WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Usuario");
    }

    /**
     * Método que retorna todos os registros da tabela pessoa no banco de dados.
     */
    public function select() : array{
        $sql = "SELECT * FROM usuario";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        /**
         * retorna um arraycom as linhas retornadas da consulta. Observeque o array é um array de objetos. Os objetos do tipo stdClass e foram criados automaticamente pelo metodo fetchAll do PDO 
         */

         return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Usuario");
    }
    /**
     * Remove um registro da tabela pessoa do banco de dados. Note que o metodo exige parâmetro $ID do tipo inteiro
     */
    public function delete(int $id) : bool{
        $sql="DELETE FROM usuario WHERE id=?";

        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}
?>