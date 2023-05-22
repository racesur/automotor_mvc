<?php

namespace Controllers;

use Model\Vendedor;
use Model\Blog;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController
{

    public static function crear(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        // Creamos una nueva instancia para mantener los valores del formulario y que no se borren si hay algún error
        $blog = new Blog();
        $vendedores = Vendedor::all(); //Muestra los vendedores
        // $errores = Blog::getErrores(); // Array con mensajes de errores
        $errores = Blog::getAlertas(); // Array con mensajes de errores

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Creamos una nueva instancia de Propiedad que recibe un array
            $blog = new Blog($_POST['blog']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
            //Reliza un resize a la imagen con intervention
            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImagen($nombreImagen);
            }

            // Validamos
            $errores = $blog->validar();

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {
                // $propiedad->guardar();

                // Crear la carpeta para subir imágenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen); //Save es una función para guardar imágenes de la librería Intervention que hemos importado y le ponemos el nombre y la carpeta donde queremos que la guarde

                //Guarda en la BBDD
                $blog->guardar();
            }
        }


        $router->render('blog/crear', [
            'blog' => $blog,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        //Protegemos la ruta de este método, para que nadie pueda acceder a la url si no es administrador, usando la funcion isAdmin
        isAdmin();

        $id = validarORedireccionar('/admin');

        $blog = Blog::find($id);

        $vendedores = Vendedor::all();

        $errores = Blog::getAlertas();

        //Método POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los atributos

            $args = $_POST['blog'];

            $blog->sincronizar($args); //Sincroniza los datos del objeto en memoria con los cambios que hagamos en el formulario de actualizar para ir cambiándolos según se modifiquen

            //Validacion
            $errores = $blog->validar();


            //Subida de archivos de imágenes al servidor
            //**GENERA UN NOMBRE ÚNICO PARA LAS IMÁGENES
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            //Reliza un resize a la imagen con intervention
            if ($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(800, 600);
                $blog->setImagen($nombreImagen);
            }

            //** Revisamos que el array $errores esté vacío */
            if (empty($errores)) {
                if ($_FILES['blog']['tmp_name']['imagen']) {
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $blog->guardar();
            }
        }

        $router->render('/blog/actualizar', [
            'blog' => $blog,
            'errores' => $errores,
            'vendedores' => $vendedores
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
                    $blog = Blog::find($id);
                    $blog->eliminar();
                }
            }
        }
    }
}
