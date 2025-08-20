<?php

namespace App\Model;

use App\DAO\UsuarioDAO;

class UsuarioModel extends Model
{
    public $id, $nm_usuario, $email, $senha, $tipo_usuario = "usuario";

    public function save()
    {
        //vai salvar os usuarios.
        // o metodo save tem que chamar o arquivo da camada DAO(que faz conexao com banco de dados) e passar todos os dados do formulario direto para ele.

        $dao = new UsuarioDAO();

        if(empty($this->id))
        {
            //insert
            $dao->CreateUsuario($this);
            
        } else{
            //update

            $dao->UpdateUsuario($this);
        }
    }

    public function getAllRows()
    {
        //Vai ler e pegar todas as linhas ou seja dar um Select * from usuario.

        $dao = new UsuarioDAO();

        $this->rows = $dao->ReadUsuario();
        // as linhas retornadas serão armazenadas no $rows.
    }

    // vai retornar as informações pro formulario por meio do ID que é recebido via URL.
    public function getById(int $id)
    {
        
        $dao = new UsuarioDAO();

        $obj = $dao->ReadById($id);
        
        if($obj)
        {
            return $obj;
        } else{
            return new UsuarioModel();
        }
    }

    public function delete(int $id)
    {

        $dao = new UsuarioDAO();

        $dao->DeleteUsuario($id);

        
    }
}