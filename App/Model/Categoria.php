<?php

namespace App\Model;

use App\DAO\categoriaDAO;
use Exeption;

final class Categoria extends Model {
    public ?int $Id = null;

    public ?string $Descricao{
        set{
            if(strlen($value)
            < 3)
        throw new Exeption("Descreva com palavras");

        $this->Descricao = $value;
        }

        get => $this->Descricao ?? null;
    }

        function save() : Categoria{
            return new CategoriaDAO()->save($this);
        }

        function getById(int $id) : ?Categoria{
            return new CategoriaDAO()->selectById($id);
        }

        function getAllRows() : array{
            $this->rows = new CategoriaDAO()->selecte();
        
            return $this->rows;
        }

        function delete(int $id) : bool{
            return new CategoriaDAO()->delete($id);
        }


    
}


?>