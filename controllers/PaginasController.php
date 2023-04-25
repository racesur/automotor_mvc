<?php

namespace Controllers;

use Model\Coche;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {
        $coches = Coche::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'coches' => $coches,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros'); //pagina estática

    }

    public static function coches(Router $router)
    {
        $coches = Coche::all();

        $router->render('paginas/coches', [
            'coches' => $coches

        ]);
    }

    public static function coche(Router $router)
    {

        $router->render('paginas/coche'); //pagina estática
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog'); //pagina estática
    }

    public static function entrada(Router $router)
    {

        $router->render('paginas/entrada'); //pagina estática
    }

    public static function contacto(Router $router)
    {
        $router->render('paginas/contacto'); //pagina estática
    }
}
