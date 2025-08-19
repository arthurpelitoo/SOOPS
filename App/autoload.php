<?php

spl_autoload_register(function ($nome_da_classe){
    echo "Tentou dar include de " . $nome_da_classe . "</br>";
    //      Tentou dar include de App\Controller\UsuarioController

    include "../" . $nome_da_classe . '.php';
});