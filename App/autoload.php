<?php

spl_autoload_register(function ($nome_da_classe){

    $arquivo = BASE_DIR . $nome_da_classe . '.php';

    if(file_exists($arquivo))
    {
        include $arquivo;
    } else
        exit('Arquivo não encontrado. Arquivo: ' . $arquivo);

});