<?php

namespace App\DAO;

use App\Model\Autor;

final class AutorDAO extends DAO{
    public function _construct(){
        parent::_construct();
    }

    public function save(Autor $model) : Autor{
        return ($model->Id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Autor $model) : Autor{
        $sql = "INSERT INTO autor (nome, data_de_nascimento, cpf) VALUES (?, ?, ?,) ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_de_Nascimento);
        $stmt->bindValue(3, $model->CPF);
        $stmt->execute();
        $model->Id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function update(Autor $model) : Autor{
        $sql = "UPDATE autor SET nome=?, data_de_nascimento=?, cpf=? WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model->Nome);
        $stmt->bindValue(2, $model->Data_de_Nascimento);
        $stmt->bindValue(3, $model->CPF);
        $stmt->bindValue(4, $model->Id);
        $stmt->execute();
        
        return $model;
    }

    public function selectById(int $id) : ?Autor{
        $sql = "SELECT * FROM autor WHERE id=? ";

        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\Autor");
    }

    /**
     * Método que retorna todos os registros da tabela pessoa no banco de dados.
     */
    public function select() : array{
        $sql = "SELECT * FROM autor";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        /**
         * retorna um arraycom as linhas retornadas da consulta. Observeque o array é um array de objetos. Os objetos do tipo stdClass e foram criados automaticamente pelo metodo fetchAll do PDO 
         */

         return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Autor");
    }
    /**
     * Remove um registro da tabela pessoa do banco de dados. Note que o metodo exige parâmetro $ID do tipo inteiro
     */
    public function delete(int $id) : bool{
        $sql="DELETE FROM autor WHERE id=?";

        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}
?>