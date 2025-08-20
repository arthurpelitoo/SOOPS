<?php

namespace App\Controller;


abstract class Controller
{

    protected static function render($viewFile, $model = null)
    {

        $arquivoView = VIEW_DIRECTORY . $viewFile . ".php";

        if(file_exists($arquivoView))
        {
            include $arquivoView;
        }else{
            exit('Arquivo da view não encontrado. Arquivo: ' . $viewFile);
        }
    }
}