<?php

namespace App\Model;

use App\DAO\autorDAO;
use Exeption;

final class Autor extends Model {
    public ?int $Id = null;

    public ?string $Nome{
        set{
            if(strlen($value)
            < 3)
        throw new Exeption("Nome deve ter no mínimo três caracteres.");

        $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }

    public ?string $Data_de_Nascimento{

        set{
            if(empty($value))
            throw new Exeption("Preencha a data de nascimento");
        $this->Data_de_Nascimento = $value;
        }

        get => $this->Data_de_Nascimento ?? null;
    }

    public ?string $CPF{

        set{
            if(strlen($value)
            < 3)
        throw new Exeption("O CPF deve ter onze caracteres.");

        $this->CPF = $value;
        }

        get => $this->CPF ?? null;
        }

        function save() : Autor{
            return new AutorDAO()->save($this);
        }

        function getById(int $id) : ?Autor{
            return new AutorDAO()->selectById($id);
        }

        function getAllRows() : array{
            $this->rows = new AutorDAO()->selecte();
        
            return $this->rows;
        }

        function delete(int $id) : bool{
            return new AutorDAO()->delete($id);
        }


    
}


?>