<?php

namespace Controllers;

use Model\Usuario;
use Model\Admin;
use MVC\Router;
use Classes\Email;

class LoginController
{
    public static function login(Router $router)
    {
        //Creamos el array de alertas que se irá llenando si falla algo
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crea una nueva instancia con lo que haya en formulario (post)
            // $auth = new Admin($_POST);

            //Instanciamos un usuario con lo que el usuario escriba en post en el formulario de iniciar sesión, solo email y password
            $auth = new Usuario($_POST);

            // Validamos el contenido de los campos
            // $errores = $auth->validar();

            //Tenemos que validar los campos de email y password para que no estén vacíos y tengan los datos correctos
            $errores = $auth->validarLogin();

            //Si los campos están completos entonces los verificamos con los datos en la BBDD
            if (empty($errores)) {
                //Verificar si existe el usuario
                // $resultado = $auth->existeUsuario();

                //Comprobar que exista el usuario buscando por el email
                $usuario = Usuario::where('email', $auth->email);

                //Verificamos el password
                if ($usuario) {
                    //Comprobamos el password y si el usuario está verificado
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)) {
                        //Autenticamos al usuario con variables de sesion
                        session_start();

                        //Añadimos algunos datos al array de sesión
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['admin'] = $usuario->admin;
                        $_SESSION['login'] = true;

                        //Redireccionamiento del usuario
                        if ($usuario->admin === "1") {
                            $_SESSION['admin'] = $usuario->admin ?? null; //ponemos null para que no dé error

                            //Redireccionamos al administrador al Panel
                            header('Location: /admin');
                        } else {
                            //Redireccionamos al usuario registrado a Panel de Citas
                            header('Location: /cita');
                        }
                    }
                } else {
                    Usuario::setAlerta('No se encuentra el Usuario o no existe');
                }
            }
        }

        //Obtenemos las alertas, si las hay
        $errores = Usuario::getAlertas();

        $router->render(
            'auth/login',
            [
                'errores' => $errores
            ]
        );


        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     //Crea una nueva instancia con lo que haya en formulario (post)
        //     $auth = new Admin($_POST);

        //     // Validamos el contenido de los campos
        //     $errores = $auth->validar();

        //     //Si los campos están completos entonces los verificamos con los datos en la BBDD
        //     if (empty($errores)) {
        //         //Verificar si existe el usuario
        //         $resultado = $auth->existeUsuario();

        //         if (!$resultado) {
        //             //Verifica si el usuario existe o no (mensaje de error)
        //             // $errores = Admin::getErrores();
        //             $errores = Admin::getAlertas();
        //         } else {
        //             //Verificar el password
        //             $autenticado = $auth->comprobarPassword($resultado);
        //             if ($autenticado) {
        //                 //Autenticar al usuario
        //                 $auth->autenticar();
        //             } else {
        //                 //Password incorrecto (mensaje de error)
        //                 // $errores = Admin::getErrores();
        //                 $errores = Admin::getAlertas();
        //             }
        //         }
        //     }
        // }

        // // Pasamos los errores hacia la vista para mostrarlos al usuario
        // $router->render('auth/login', [
        //     'errores' => $errores

        // ]);
    }

    // Cerramos la sesión y la destruimos para que nadie pueda obtener los datos
    public static function logout()
    {
        session_start();

        $_SESSION = [];

        session_destroy();

        // Redireccionamos al USUARIO hacia la página principal
        header('Location: /');
    }

    public static function olvide(Router $router)
    {
        //Inicializamos la variable alertas para obtener las alertas si las hay
        $errores = [];

        //** MOSTRAR UN MENSAJE DE INFO AL USUARIO */
        //Creo una segunda variable porque quiero mostrar un mensaje en verde al usuario
        $mensaje = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Creamos una instancia de usuario con el dato de email que escriba el usuario
            $auth = new Usuario($_POST);
            //Validamos que el campo email no esté vacío
            $errores = $auth->validarEmail();

            //Si no hay alertas
            if (empty($errores)) {
                $usuario = Usuario::where('email', $auth->email); //buscamos en la columna email por el valor escrito por el usuario

                //Tenemos que verificar que existe el usuario y que esté confirmado
                if ($usuario && $usuario->confirmado === "1") {

                    //Si cumple las dos condiciones generamos un token para enviárselo al correo
                    $usuario->crearToken();
                    // $usuario->guardar(); //hace un update en la bbdd añadiendo el token a la cuenta
                    $usuario->actualizarCuenta(); //hace un update en la bbdd añadiendo el token a la cuenta

                    //envío del correo para recuperar la contraseña creando una instancia de la clase Email con los datos del usuario y el valor del token creado
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstrucciones();

                    //Alerta de éxito
                    $mensaje = 'Te hemos enviado un correo para recuperar la clave de tu cuenta';
                } else {
                    //Creamos una alerta porque el usuario no existe o no lo han confirmado
                    Usuario::setAlerta('El Usuario no existe o la cuenta no está verificada');
                }
            }
        }

        $errores = Usuario::getAlertas();

        $router->render('auth/olvide-password', [

            'errores' => $errores,
            'mensaje' => $mensaje
        ]);
    }

    //Método para recuperar la contraseña de la cuenta
    public static function recuperar(Router $router)
    {
        //Creamos las alertas
        $errores = [];
        //Creo una segunda variable porque quiero que el formulario desaparezca si hay un error
        $error = false;

        $token = s($_GET['token']); //obtenemos el token y lo sanitizamos por si hay inyeccion sql

        //Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        //Si está vacío el array, es porque es null y no ha encontrado al usuario
        if (empty($usuario)) {
            Usuario::setAlerta('Token no válido');
            //cambiamo el valor de la variable error a true
            $error = true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Primero creamos una nueva instancia de usuario y la llamamos password que contiene la nueva contraseña. Lo llamamos password para que no se sobreescriban los datos del objeto usuario que estamos modificando y tiene todos los datos obtenidos de la bbdd
            $password = new Usuario($_POST); //
            $errores = $password->validarPassword(); //Validamos la contraseña escrita

            //Si la variable errores está vacía
            if (empty($errores)) {
                $usuario->password = null; //eliminamos la contraseña antigua del usuario
                $usuario->password = $password->password; //de la instancia creada antes recupero el valor del campo password y se lo asígno al objeto usuario
                //Hasheo la nueva contraseña para guardarla en la bbdd
                $usuario->hashPassword();
                //Una vez que le hemos cambiado la contraseña, eliminamos el token para que nadie pueda usarlo de nuevo
                $usuario->token = null;

                //Guardamos los nuevos datos en la bbdd
                $resultado = $usuario->actualizarCuenta(); //Este método actualiza la cuenta del usuario

                //Si se ha guardado correctamente redirigimos al usuario para mostrar un mensaje de confirmacion
                if ($resultado) {
                    header('Location: /confirmacion');
                }
            }
        }

        $errores = Usuario::getAlertas();

        //Renderiza la vista
        $router->render('auth/recuperar-password', [

            'errores' => $errores,
            'error' => $error
        ]);
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;

        //Alertas vacías
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario->sincronizar($_POST);
            $errores = $usuario->validarNuevaCuenta();

            //Revisar que el array de alertas esté vacío
            if (empty($errores)) {
                //Verificar que el usuario no esté registrado ya;
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    //Si hay resultados crea una alerta
                    $errores = Usuario::getAlertas();
                } else {
                    //Hasear el password
                    $usuario->hashPassword();

                    //Generar un Token único
                    $usuario->crearToken();

                    //Creamos una instancia de email con los datos del usuario
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);

                    //Enviar un correo electrónico de confirmación
                    $email->enviarConfirmacion();

                    //Guardar el usuario en la BBDD
                    $resultado = $usuario->crearCuenta();
                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'errores' => $errores

        ]);
    }

    //Método para mostrar el mensaje de confirmación de la cuenta
    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }

    public static function confirmacion(Router $router)
    {
        $router->render('auth/confirmacion');
    }

    //Método para confirmar la cuenta
    public static function confirmar(Router $router)
    {

        $errores = [];

        //** MOSTRAR UN MENSAJE DE INFO AL USUARIO */
        //Creo una segunda variable porque quiero mostrar un mensaje en verde al usuario
        $mensaje = false;

        //Confirmamos la cuenta leyendo el token con el método get, pero sanitizamos la entrada por si alguien escribe algo. Si el token está dentro de la bbdd se confirma la cuenta
        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        //Validamos si existe el usuario en la bbdd asociado a ese token
        if (empty($usuario)) {
            //Mostramos mensaje de error
            // $errores = Usuario::setAlerta('Token de acceso no válido');
            Usuario::setAlerta('Token de acceso no válido');
        } else {
            //Modificamos al usuario estableciendo el valor 1 en el atributo de confirmado
            $usuario->confirmado = "1";
            //Eliminamos el token para que nadie pueda utilizarlo después
            $usuario->token = null;
            //Guardamos al usuario, ya modificado, en la bbdd
            $usuario->actualizarCuenta();
            //Informamos al usuario que ha confirmado la cuenta
            // Usuario::setAlerta('Cuenta verificada correctamente');
            //Alerta de éxito
            //** MODIFICADO PARA MOSTRAR UN MENSAJE EN VERDE */
            $mensaje = 'La cuenta ha sido verificada correctamente';
        }

        //Obtener las alertas
        $errores = Usuario::getAlertas();

        //renderiza la vista
        $router->render('auth/confirmar-cuenta', [

            'errores' => $errores,
            'mensaje' => $mensaje
        ]);
    }
}
