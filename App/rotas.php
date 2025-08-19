<?php

use App\Controller\UsuarioController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// serve para ler o que está na url depois da barra

// controle de rotas
// se caso url for / entrega a pagina inicial e assim vai, ele checa os casos. Default é o que acontece se nenhum dos casos baterem.

switch($url)
{
    case '/':
        echo "pagina inicial";
    break;

    case '/usuario':
        UsuarioController::index();
    break;

    case '/usuario/form':
        UsuarioController::form();
    break;
    
    case '/usuario/form/save':
        UsuarioController::save();
    break;

    case '/usuario/delete':
        UsuarioController::delete();
    break;

    default:
        echo "erro404";
    break;
}