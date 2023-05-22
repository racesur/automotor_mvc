<?php

namespace Controllers;

use Model\Servicio;
use Model\Mecanico;
use MVC\Router;

//Para las vistas creo una nueva carpeta llamada servicios en views donde estarán todas las vistas y se las añadimos usando router render para que las muestre cuando vamos a la url

class ServicioController
{
    //El método de crear tiene GET y POST
    public static function crear(Router $router)
    {
        //iniciamos sesion
        // session_start();

        //Protegemos la ruta del servicio, para que nadie pueda acceder a la url si no es administrador usando la funcion isAdmin
        isAdmin();

        //Creamos un nuevo objeto de servicio para que coja los datos del formulario
        // y lo paso hacia la vista
        $servicio = new Servicio();
        $mecanicos = Mecanico::all();
        //Genero un nuevo array de alerta para validar los datos del formulario y lo paso a la vista
        // $alertas = [];
        // $errores = Servicio::getErrores(); // Array con mensajes de errores
        $errores = Servicio::getAlertas(); // Array con mensajes de errores

        //Si llamamos al método desde POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Creamos una nueva instancia de Vendedor que recibe un array con los datos del vendedor
            $servicio = new Servicio($_POST['servicio']);

            //Sincroniza el objeto en memoria y le asigna los valores del post
            $servicio->sincronizar($_POST);

            //Validamos los datos introducidos en el formulario
            $errores = $servicio->validar();

            //Si no hay ninguna alerta podemos guardar el nuevo servicio y redirigimos al usuario
            if (empty($errores)) {
                $servicio->guardar();
                // header('Location: /admin');
            }
        }

        $router->render('servicios/crear', [
            'servicio' => $servicio,
            'mecanicos' => $mecanicos,
            'errores' => $errores,
        ]);
    }

    //El método de actualizar tiene GET y POST
    public static function actualizar(Router $router)
    {

        //Protegemos la ruta del servicio, para que nadie pueda acceder a la url si no es administrador usando la funcion isAdmin
        isAdmin();

        $id = validarORedireccionar('/admin');

        $mecanicos = Mecanico::all();
        // $errores = Servicio::getErrores();
        $errores = Servicio::getAlertas();

        //Inicio la sesión
        // session_start();

        //** Creamos la variable servicio y obtenemos los datos del servicio obtenidos de la bbdd buscando por su id y lo paso hacia la vista para que muestre eso datos en el formulario que queremos modificar/actualizar*/
        //Validamos que el id sea un número evitando inyeccion SQL. La función is_numeric devuelve T/F
        $id = $_GET['id'];
        //Si el id no es un número dejamos de ejecutar el código
        if (!is_numeric($id)) return;
        //Buscamos en la bbdd los datos del servicio mediante su id
        $servicio = Servicio::find($id);
        //Genero un nuevo array de alerta para validar los datos del formulario y lo paso a la vista
        $errores = [];


        //Si llamamos al método desde POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Asignamos los valores
            $args = $_POST['servicio'];

            //Sincronizamos los valores del objeto en memoria con lo que el usuario escribió
            $servicio->sincronizar($args); //Toma los valores que el usuario está enviando y los mapea con los que tiene en memoria para tener la última version de lo que escribimos

            //Validación de los datos nuevos introducidos por el usuario
            $errores = $servicio->validar();

            if (empty($errores)) {
                //Si no hay ninguna alerta podemos guardar el nuevo servicio
                $servicio->guardar();
            }
        }

        $router->render(
            '/servicios/actualizar',
            [
                'servicio' => $servicio,
                'mecanicos' => $mecanicos,
                'errores' => $errores
            ]
        );
    }

    //Este método no requiere usar la clase router porque solo va a leer el id
    public static function eliminar($id)
    {
        //Protegemos la ruta del servicio, para que nadie pueda acceder a la url si no es administrador usando la funcion isAdmin
        isAdmin();

        //Si llamamos al método desde POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                //Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $servicio = Servicio::find($id);
                    $servicio->eliminar();
                }
            }
        }
    }
}
