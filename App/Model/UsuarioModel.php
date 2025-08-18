<?php



class UsuarioModel
{
    public $id, $nm_usuario, $email, $senha, $tipo_usuario = "usuario";

    public $rows;
    // vai armazenar todas as linhas que vierem do banco de dados;

    public function save()
    {
        //vai salvar os usuarios.
        // o metodo save tem que chamar o arquivo da camada DAO(que faz conexao com banco de dados) e passar todos os dados do formulario direto para ele.
        include "Dao/UsuarioDAO.php";

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
        include "Dao/UsuarioDAO.php";

        $dao = new UsuarioDAO();

        $this->rows = $dao->ReadUsuario();
        // as linhas retornadas serão armazenadas no $rows.
    }

    // vai retornar as informações pro formulario por meio do ID que é recebido via URL.
    public function getById(int $id)
    {
        
        include "Dao/UsuarioDAO.php";

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
        include "Dao/UsuarioDAO.php";

        $dao = new UsuarioDAO();

        $dao->DeleteUsuario($id);

        
    }
}