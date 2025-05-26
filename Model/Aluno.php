<?php

namespace App\Model;

use App\DAO\alunoDAO;
use Exeption;

final class Aluno extends Model {
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

    public ?string $RA{

        set{
            if(empty($value))
            throw new Exeption("Preencha o RA");
        $this->RA = $value;
        }

        get => $this->RA ?? null;
    }

    public ?string $Curso{

        set{
            if(strlen($value)
            < 3)
        throw new Exeption("Curso deve ter no mínimo três caracteres.");

        $this->Curso = $value;
        }

        get => $this->Curso ?? null;
        }

        function save() : Aluno{
            return new AlunoDAO()->save($this);
        }

        function getById(int $id) : ?Aluno{
            return new AlunoDAO()->selectById($id);
        }

        function getAllRows() : array{
            $this->rows = new AlunoDAO()->selecte();
        
            return $this->rows;
        }

        function delete(int $id) : bool{
            return new AlunoDAO()->delete($id);
        }


    
}


?>