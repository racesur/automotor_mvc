<?php

namespace Controllers;

use Model\Vendedor;
use Model\Mecanico;
use Model\Coche;
use Model\Blog;
use MVC\Router;


class AdminPanelController
{
    public static function index(Router $router) //la ponemos static para no tener que instanciarla. Le pasamos el objeto de router para mantener los datos, por eso no volvemos a crear otro objeto router con $router=new Router, porque perdería los datos del objeto creado en el index
    {

        $coches = Coche::all();
        $vendedores = Vendedor::all();
        $mecanicos = Mecanico::all();
        $blogs = Blog::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        // Mostramos la vista que tenemos en auth/admin.php
        $router->render('auth/admin', [
            'coches' => $coches,
            'resultado' => $resultado,
            'vendedores' => $vendedores,
            'mecanicos' => $mecanicos,
            'blogs' => $blogs
        ]);
    }
}
