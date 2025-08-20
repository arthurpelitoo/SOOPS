<?php

namespace App\Dao;

use \PDO;

abstract class DAO
{

    protected $conexao;

    public function __construct()
    {
        // o dsn tem que receber o host(que no caso é localhost e a porta aqui por enquanto) e tambem o nome do banco de dados
        $dsn = "mysql:host=" . $_ENV['db']['host']. ";dbname=" . $_ENV['db']['database'];

        $this->conexao = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']); // o PDO Representa uma conexao entre o PHP e um banco de dados server. Ele pede ($dsn(data source name), nome do usuario no host, senha do host)
    }
}