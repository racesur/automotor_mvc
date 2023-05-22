<?php

namespace Controllers;

use MVC\Router;


class CitaController
{
    public static function index(Router $router)
    {

        //Comprobamos si el usuario está autenticado
        isAuth();

        //Pasamos los datos del nombre de usuario a la vista
        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}
