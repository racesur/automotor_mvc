<?php

namespace Controllers;

use Model\Vendedor;
use Model\Coche;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image; //le ponemos un alias para no tener que escribir todo el nombre con la ruta

class CocheController
{

    public static function crear(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // Creamos una nueva instancia para mantener los valores del formulario y que no se borren si hay algún error
        $coche = new Coche;
        $vendedores = Vendedor::all(); //Porque queremos mostrar los vendedores
        // $errores = Coche::getErrores(); // Array con mensajes de errores validación
        $errores = Coche::getAlertas(); // Array con mensajes de errores validación

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Creamos una nueva instancia de Coche que recibe un array
            $coche = new Coche($_POST['coche']);

            // Le ponemos a la imagen un nombre único para evitar sobreescribir una imagen del sitio web usando md5 uniqid y rand que son funciones predefinidar de PHP, después le añadimos la extensión de la imagen JPG
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
            //Reliza un resize a la imagen con fit de intervention y la seteamos con el método setimagen() de ActiveRecord
            if ($_FILES['coche']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['coche']['tmp_name']['imagen'])->fit(800, 600);
                $coche->setImagen($nombreImagen);
            }

            // Validamos los errores por si hubiera campos vacíos
            $errores = $coche->validar();

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {

                // Si no existe la carpeta la crea para guardar las imágenes en el servidor
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); //Save es una función para guardar imágenes de la librería Intervention que hemos importado y le ponemos el nombre y la carpeta donde queremos que la guarde

                //Guarda en la BBDD
                $coche->guardar();
            }
        }

        $router->render('coches/crear', [
            'coche' => $coche,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        $id = validarORedireccionar('/admin');

        $coche = Coche::find($id);

        $vendedores = Vendedor::all();

        // $errores = Coche::getErrores();
        $errores = Coche::getAlertas();

        //Método POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los atributos

            $args = $_POST['coche'];

            $coche->sincronizar($args); //Sincroniza los datos del objeto en memoria con los cambios que hagamos en el formulario de actualizar para ir cambiándolos según se modifiquen

            //Validacion
            $errores = $coche->validar();


            //Subida de archivos de imágenes al servidor
            //**GENERA UN NOMBRE ÚNICO PARA LAS IMÁGENES
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            //Reliza un resize de 800x600 a la imagen usando intervention
            if ($_FILES['coche']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['coche']['tmp_name']['imagen'])->fit(800, 600);
                $coche->setImagen($nombreImagen);
            }

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {
                if ($_FILES['coche']['tmp_name']['imagen']) {
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $coche->guardar();
            }
        }

        $router->render('/coches/actualizar', [
            'coche' => $coche,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar($id)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Ponemos POST porque las variables no existirán hasta que enviemos el formulario para eliminar el registro que queremos
            //Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT); //Filtramos por si alguien escribe algo en la URL

            if ($id) {
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $coche = Coche::find($id);
                    $coche->eliminar();
                }
            }
        }
    }
}
