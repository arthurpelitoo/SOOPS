<?php

/**
 * Caminhos de diretorio
 */

//define o caminho base
define('BASE_DIR', dirname(__DIR__) . '/');


// define o caminho base para a View
$viewBasePath = '/App/View/modules/';
define('VIEW_DIRECTORY', dirname(__DIR__) . $viewBasePath);
// VIEW_DIRECTORY é pra caminho relativo: links entre paginas internas, css, js, imagens internas em html.

/**
 * Dados de Conexão ao banco de dados.
 */

$_ENV['db']['host'] = "localhost:3306";
$_ENV['db']['user'] = "root";
$_ENV['db']['pass'] = "";
$_ENV['db']['database'] = "soops";