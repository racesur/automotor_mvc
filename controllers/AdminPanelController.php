<?php

namespace Controllers;

use MVC\Router;


class AdminPanelController
{
    public static function index(Router $router) //la ponemos static para no tener que instanciarla. Le pasamos el objeto de router para mantener los datos, por eso no volvemos a crear otro objeto router con $router=new Router, porque perdería los datos del objeto creado en el index
    {

        // Mostramos la vista que tenemos en auth/admin.php
        $router->render('auth/admin', []);
    }
}
