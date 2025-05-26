<?php

namespace App\DAO;

use App\Model\Categoria;

final class CategoriaDAO extends DAO{
    public function _construct(){
        parent::_construct();
    }

    public function save(Categoria $model) : Categoria{
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Categoria $model) : Categoria{
        $sql = "INSERT INTO categoria (descricao) VALUES (?, ) ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Descrição);
        $stmt->execute();
        $model->Id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Categoria $model) : Categoria{
        $sql = "UPDATE categoria SET descricao=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Descrição);
        $stmt->bindValue(2, $model->Id);
        $stmt->execute();
        
        return $model;
    }

    public function selectById(int $id) : ?Categoria{
        $sql = "SELECT * FROM categoria WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Categoria");
    }

    /**
     * Método que retorna todos os registros da tabela pessoa no banco de dados.
     */
    public function select() : array{
        $sql = "SELECT * FROM categoria";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        /**
         * retorna um arraycom as linhas retornadas da consulta. Observeque o array é um array de objetos. Os objetos do tipo stdClass e foram criados automaticamente pelo metodo fetchAll do PDO 
         */

         return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Categoria");
    }
    /**
     * Remove um registro da tabela pessoa do banco de dados. Note que o metodo exige parâmetro $ID do tipo inteiro
     */
    public function delete(int $id) : bool{
        $sql="DELETE FROM categoria WHERE id=?";

        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}
?>