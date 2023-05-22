<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController
{
    public static function crear(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // $errores = Vendedor::getErrores();
        $errores = Vendedor::getAlertas();

        // Creamos una nueva instancia para mantener los valores del formulario y que no se borren si hay algún error
        $vendedor = new Vendedor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Creamos una nueva instancia de Vendedor que recibe un array con los datos del vendedor
            $vendedor = new Vendedor($_POST['vendedor']);

            // Le ponemos a la imagen un nombre único para evitar sobreescribir una imagen del sitio web usando md5 uniqid y rand que son funciones predefinidar de PHP, después le añadimos la extensión de la imagen JPG
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //Setear la imagen
            //Reliza un resize a la imagen con fit de intervention y la seteamos con el método setimagen() de ActiveRecord
            if ($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800, 600);
                $vendedor->setImagen($nombreImagen);
            }

            //Validar los datos del formulario para evitar campos vacíos
            $errores = $vendedor->validar();

            //Si no hay errores
            if (empty($errores)) {

                // Crear la carpeta para subir imágenes en el caso de que no exista
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); //Save es una función para guardar imágenes de la librería Intervention que hemos importado y le ponemos el nombre y la carpeta donde queremos que la guarde

                //Guardamos en la BBDD
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
    }

    public static function actualizar(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // $errores = Vendedor::getErrores();
        $errores = Vendedor::getAlertas();
        $id = validarORedireccionar('/admin');

        //Obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Asignamos los valores
            $args = $_POST['vendedor'];

            //** Sincronizar los datos del objeto en memoria con los nuevos datos que el usuario está enviando */
            //Sincronizamos los valores del objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args); //Toma los valores que el usuario está enviando y los mapea con los que tiene en memoria para tener la última version de lo que escribimos

            //Validación de los datos nuevos introducidos por el usuario
            $errores = $vendedor->validar();

            //Subida de archivos de imágenes al servidor
            //**GENERA UN NOMBRE ÚNICO PARA LAS IMÁGENES
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Reliza un resize a la imagen con intervention
            if ($_FILES['vendedor']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen'])->fit(800, 600);
                $vendedor->setImagen($nombreImagen);
            }

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {
                if ($_FILES['vendedor']['tmp_name']['imagen']) {
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Si no hay errores guardamos los datos en la bbdd
                $vendedor->guardar();

                // if (empty($errores)) {
                //     $vendedor->guardar();
                // }
            }
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar()
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validar el id para que no introduzcan una consulta SQL
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); // comprobamos que sea un número

            if ($id) {
                //Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}
