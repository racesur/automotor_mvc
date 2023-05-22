<?php

namespace Controllers;

use Model\Mecanico;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class MecanicoController
{
    public static function crear(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // $errores = Mecanico::getErrores();
        $errores = Mecanico::getAlertas();

        // Creamos una nueva instancia para mantener los valores del formulario y que no se borren si hay algún error
        $mecanico = new Mecanico();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Creamos una nueva instancia de Mecánico que recibe un array con los datos del formulario
            $mecanico = new Mecanico($_POST['mecanico']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //Setear la imagen
            //Reliza un resize a la imagen con intervention
            if ($_FILES['mecanico']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['mecanico']['tmp_name']['imagen'])->fit(800, 600);
                $mecanico->setImagen($nombreImagen);
            }

            //Validar los datos del formulario para evitar campos vacíos
            $errores = $mecanico->validar();

            //No hay errores
            if (empty($errores)) {

                // Crear la carpeta para subir imágenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); //Save es una función para guardar imágenes de la librería Intervention que hemos importado y le ponemos el nombre y la carpeta donde queremos que la guarde

                //Guardamos en la BBDD
                $mecanico->guardar();
            }
        }

        $router->render('mecanicos/crear', [
            'errores' => $errores,
            'mecanico' => $mecanico

        ]);
    }

    public static function actualizar(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // $errores = Mecanico::getErrores();
        $errores = Mecanico::getAlertas();
        $id = validarORedireccionar('/admin');

        //Obtener datos del mecanico a actualizar
        $mecanico = Mecanico::find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignamos los valores
            $args = $_POST['mecanico'];

            //Sincronizamos los valores del objeto en memoria con lo que el usuario escribió
            $mecanico->sincronizar($args); //Toma los valores que el usuario está enviando y los mapea con los que tiene en memoria para tener la última version de lo que escribimos

            //Validación de los datos nuevos introducidos por el usuario
            $errores = $mecanico->validar();

            //Subida de archivos de imágenes al servidor
            //**GENERA UN NOMBRE ÚNICO PARA LAS IMÁGENES
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Reliza un resize a la imagen con intervention
            if ($_FILES['mecanico']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['mecanico']['tmp_name']['imagen'])->fit(800, 600);
                $mecanico->setImagen($nombreImagen);
            }

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {
                if ($_FILES['mecanico']['tmp_name']['imagen']) {
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Si no hay errores guardamos los datos en la bbdd
                $mecanico->guardar();
            }
        }

        $router->render('mecanicos/actualizar', [
            'errores' => $errores,
            'mecanico' => $mecanico
        ]);
    }

    public static function eliminar()
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                //Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $mecanico = Mecanico::find($id);
                    $mecanico->eliminar();
                }
            }
        }
    }
}
