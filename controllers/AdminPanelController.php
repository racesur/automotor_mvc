<?php

namespace Controllers;

use Model\Vendedor;
use Model\Servicio;
use Model\Mecanico;
use Model\Coche;
use Model\Blog;
use MVC\Router;

class AdminPanelController
{
    public static function index(Router $router) //la ponemos static para no tener que instanciarla. Le pasamos el objeto de router para mantener los datos, por eso no volvemos a crear otro objeto router con $router=new Router, porque perdería los datos del objeto creado en el index
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        $coches = Coche::all();
        $vendedores = Vendedor::all();
        $mecanicos = Mecanico::all();
        $blogs = Blog::all();
        $servicios = Servicio::all();

        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        // Mostramos los datos en la vista que tenemos en auth/admin.php
        $router->render('auth/admin', [
            'coches' => $coches,
            'resultado' => $resultado,
            'vendedores' => $vendedores,
            'mecanicos' => $mecanicos,
            'blogs' => $blogs,
            'servicios' => $servicios
        ]);
    }
}
