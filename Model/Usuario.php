<?php

namespace App\Model;

use App\DAO\usuarioDAO;
use Exeption;

final class Usuario extends Model {
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

    public ?string $Email{

        set{
            if(empty($value))
            throw new Exeption("Escreva o Email");
        $this->Email = $value;
        }

        get => $this->Email ?? null;
    }

    public ?string $Senha{

        set{
            if(strlen($value)
            < 3)
        throw new Exeption("Senha deve ter no mínimo seis caracteres.");

        function save() : Usuario{
            return new UsuarioDAO()->save($this);
        }

        function getById(int $id) : ?Usuario{
            return new UsuarioDAO()->selectById($id);
        }

        function getAllRows() : array{
            $this->rows = new UsuarioDAO()->selecte();
        
            return $this->rows;
        }

        function delete(int $id) : bool{
            return new UsuarioDAO()->delete($id);
        }

    }

}
    
}

?>