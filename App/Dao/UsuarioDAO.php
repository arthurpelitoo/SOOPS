<?php

// toda vez que eu criar um objeto do tipo UsuarioDao ele vai chamar o metodo construtor dele,
// esse metodo vai criar um novo objeto PDO que vai ser uma conexao com o sgbd e o mysql e essa conexao ficará armazenada na propriedade $conexao;

// 🔹 O que é SGBD?

// SGBD = Sistema de Gerenciamento de Banco de Dados
// É o software responsável por:

// Criar, organizar e gerenciar bancos de dados.

// Controlar acesso de usuários (login, permissões).

// Executar consultas (SQL).

// Garantir segurança e integridade dos dados.

// 👉 Exemplos de SGBDs: MySQL(olha ele aí!), PostgreSQL, Oracle, SQL Server, MariaDB, SQLite.

namespace App\DAO;

use App\Dao\DAO;
use App\Model\UsuarioModel;
use \PDO;

class UsuarioDAO extends DAO

{

    public function __construct()
    {
        parent::__construct();
    }

    public function CreateUsuario(UsuarioModel $model)
    {
        $sql = "INSERT INTO usuario (nm_usuario, email, senha) VALUES (?, ?, ?) ";
        // essa é uma string de comando.

        //metodo de preparacao da string para inserção de dados.
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nm_usuario);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->senha);
        
        $stmt->execute();
        //executa e salva os valores no banco;
    }

    //operacao read sempre está retornando dados.

    public function ReadUsuario()
    {
        $sql = "SELECT * FROM usuario ";
        // pega todos os registros da tabela Usuario

        $stmt = $this->conexao->prepare($sql);
        

        $stmt->execute(); 

        return $stmt->fetchAll(PDO::FETCH_CLASS);
        // e vai retornar eles na forma de um array de objeto.
    }

    public function ReadById(int $id)
    {

        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject('App\Model\UsuarioModel');
    }

    public function UpdateUsuario(UsuarioModel $model)
    {
        $sql = "UPDATE usuario SET nm_usuario=?, email=?, senha=?, tipo_usuario=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nm_usuario);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->tipo_usuario);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    public function DeleteUsuario(int $id)
    {
        $sql = "DELETE FROM usuario where id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}