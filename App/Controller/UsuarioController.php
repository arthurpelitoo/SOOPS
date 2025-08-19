<?php

namespace App\Controller;

use App\Model\UsuarioModel;

class UsuarioController
{
    // a rota /usuario entrega a listagem de toda a tabela usuario.
    public static function index()
    {
        //traz o model pra transportar os dados da Controller até a DAO e vice versa
        $model = new UsuarioModel();

        $model->getAllRows();
        
        include 'View/modules/Usuario/ListaUsuario.php';
    }

    // a rota /usuario/form entrega o formulario da tabela usuario.
    public static function form() 
    {
        //traz o model pra transportar os dados da Controller até a DAO e vice versa
        
        // instancia a classe
        $model = new UsuarioModel();

        //verifica se a url tem form?id=['valoriradoID']
        if(isset($_GET['id']))
        {
            // vai retornar as informações pro formulario por meio do ID que é recebido via URL. (pra funcao UPDATE).
            $model = $model->getById((int) $_GET['id']); // O (int) evita sqlInjection, sendo um type cast explícito. Ele converte o valor recebido (nesse caso, uma string que veio da URL) para o tipo inteiro.
        }

        include 'View/modules/Usuario/FormUsuario.php';
    }

    public static function save()
    {
        //traz o model pra transportar os dados da Controller até a DAO
        
        // instancia a classe e define os atributos para salvamento
        $model = new UsuarioModel();

        $model->id = $_POST['id'];
        $model->nm_usuario = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        //e usa o metodo save da classe para conversar com o banco de dados
        $model->save();

        // joga pra pagina/rota pra ver a listagem da tabela.
        header("Location: /usuario");
    }

    public static function delete()
    {
        //traz o model pra transportar os dados da Controller até a DAO
        
        // instancia a classe
        $model = new UsuarioModel();

        $model->delete( (int) $_GET['id'] );

        // joga pra pagina/rota pra ver a listagem da tabela.
        header("Location: /usuario");
    }
}