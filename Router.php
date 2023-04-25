<?php

namespace MVC;

class Router
{
    public $rutasGET = []; //lo ponemos como array porque usaremos 1 funcion q usa arrays
    public $rutasPOST = [];

    public function get($url, $fn) //Método donde tendremos todas las url que van a reaccionar a un metodo GET, toma 2 valore la url que estemos visitando y la función asociada a esa url
    {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) //Método donde tendremos todas las url que van a reaccionar a un metodo post, toma 2 valore la url que estemos visitando y la función asociada a esa url
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Array de rutas protegidas de la web
        $rutas_protegidas = ['/admin'];


        //Rutas que soportan nuestra web
        $urlActual = $_SERVER['PATH_INFO'] ?? '/'; //saber lo que el usuario pone en la url y saber si es una url válida. Si no existe ese valor le pone una /
        $metodo = $_SERVER['REQUEST_METHOD']; //saber qué método se está utilizando GET o POST
        if ($metodo === 'GET') {
            //colocamos las url dentro del array $rutasGET
            $fn = $this->rutasGET[$urlActual] ?? null; //si no existe la url tendrá valor null
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas
        //in_array lo que hace es buscar un elemento dentro de un array, buscamos la ruta actual del usuario dentro de las rutas protegidas y vemos si ha iniciado sesión
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }


        if ($fn) {
            //La URL existe y hay una funcion asociada

            call_user_func($fn, $this); //call_user_func nos permite llamar a una funcion cuando no sabemos cómo se llama esa funcion porque si tenemos varias urls con funciones asociadas no sabemos cuál llamar. Esas funciones están definidas en el controlador. Con this le estamos pasando las variables de rutasPOST y rutasGet
        } else {
            echo 'Página no encontrada'; // TODO - redireccionar a una pagina de error 404
        }
    }

    //Muestra una vista
    public function render($view, $datos = []) //Le pasamos una vista y va tomar un array de datos
    {
        foreach ($datos as $key => $value) {
            $$key = $value; //$$key genera variables con los valores de los keys que le pasamos en $datos y les asigna el valor asociado, ejemplo, 'mensaje'=>'hola', esto lo transforma a $mensaje='hola'
        }

        ob_start(); //Indicamos que empezamos a guardar los datos en memoria(la vista) - Alamacenamiento en memoria durante un momento
        include __DIR__ . "/views/$view.php"; //queda almacenado en memoria

        $contenido = ob_get_clean(); //Limpiamos la memoria

        include __DIR__ . "/views/layout.php"; // le pasa la variable $contenido a la pagina maestra (con el header y footer) y donde está la variable $contenido donde mostrará el contenido de la página almacenada de la variable $contenido
    }
}
