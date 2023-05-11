<?php

namespace Controllers;

use Model\Admin;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crea una nueva instancia con lo que haya en formulario (post)
            $auth = new Admin($_POST);

            // Validamos el contenido de los campos
            $errores = $auth->validar();

            //Si los campos están completos entonces los verificamos con los datos en la BBDD
            if (empty($errores)) {
                //Verificar si existe el usuario
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    //Verifica si el usuario existe o no (mensaje de error)
                    $errores = Admin::getErrores();
                } else {
                    //Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        //Autenticar al usuario
                        $auth->autenticar();
                    } else {
                        //Password incorrecto (mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        // Pasamos los errores hacia la vista para mostrarlos al usuario
        $router->render('auth/login', [
            'errores' => $errores

        ]);
    }

    // Cerramos la sesión y la destruimos para que nadie pueda obtener los datos
    public static function logout()
    {
        session_start();

        $_SESSION = [];

        session_destroy();

        // Redireccionamos al USUARIO hacia la página principal del sitio
        header('Location: /');
    }

    public static function olvide(Router $router)
    {
        $router->render('auth/olvide-password', []);
    }
}
