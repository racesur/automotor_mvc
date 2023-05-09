<?php

namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use Model\Vendedor;
use Model\Coche;
use Model\Blog;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {
        $coches = Coche::get(3);
        $blogs = Blog::get(1); // mostramos 1 entrada del Blog
        $vendedores = Vendedor::all();
        $inicio = true;

        $router->render('paginas/index', [
            'coches' => $coches,
            'vendedores' => $vendedores,
            'blogs' => $blogs,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros'); //pagina estática

    }

    // Página de la Galería de Vehículos
    public static function coches(Router $router)
    {
        $coches = Coche::all();

        $router->render('paginas/coches', [
            'coches' => $coches

        ]);
    }

    // Mostramos un vehículo determinado
    public static function coche(Router $router)
    {

        // Obtenemos el id de la url y evitamos inyecciónSQL
        $id = validarORedireccionar('/coche');

        //Buscar en la BBDD el vehículo por su id
        $coche = Coche::find($id);

        $router->render('paginas/coche', [
            'coche' => $coche
        ]);
    }

    public static function blog(Router $router)
    {
        $vendedores = Vendedor::all();
        $blogs = Blog::all();

        $router->render('paginas/blog', [
            'vendedores' => $vendedores,
            'blogs' => $blogs
        ]);
    }

    public static function entrada(Router $router)
    {

        $id = validarORedireccionar('/entrada');

        //Buscar el artículo por su id
        $blog = Blog::find($id);
        $vendedores = Vendedor::all();

        $router->render('paginas/entrada', [
            'blog' => $blog,
            'vendedores' => $vendedores

        ]);
    }

    public static function contacto(Router $router)
    {
        // $router->render('paginas/contacto'); //pagina estática


        // Método para enviar correos con PHPMailer
        $mensaje = null;
        // PARA ENVIAR UN MENSAJE DE ERROR
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];

            //Crear una nueva instancia de PHPMailer porque es una librería OO
            $mail = new PHPMailer();

            //Configuramos SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; //direccion servidor smtp
            $mail->SMTPAuth = true; //Nos vamos a autenticar con nombre y pass
            $mail->Username = 'c0e081215363cd';
            $mail->Password = '4be611bfb86bb3';
            $mail->SMTPSecure = 'tls'; //encriptacion de envio seguro
            $mail->Port = 25;

            //Configurar el contenido del Email
            $mail->setFrom("admin@automotor.com"); //quien envía el correo, ponemos esta direccion para evitar correo de personas desconocidas porque irian al spam
            $mail->addAddress("admin@automotor.com", "AutoMotor.com"); //a quién va a llegar ese correo y quién lo envía
            $mail->Subject = 'Nuevo mensaje de AutoMotor'; //Asunto del correo

            //Habilitamos HTML
            $mail->isHTML(true); //Para poder usar HTML en el contenido del email
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= ' <p>Nuevo mensaje de AutoMotor</p>';
            $contenido .= ' <p>Nombre: ' . $respuestas['nombre'] . ' </p>';


            //Enviar de forma condicional algunos campos de email o telefono
            if ($respuestas['contacto'] === 'telefono') {
                //Se trata de un telefono, agregamos el campo telefono fecha y hora
                $contenido .= '<p>Ha elegido ser contactado por un Teléfono</p>';
                $contenido .= ' <p>Teléfono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= ' <p>Fecha de contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= ' <p>Hora de contacto: ' . $respuestas['hora'] . ' </p>';
            } else {
                //Se trata de un email, entonces agregamos el campo de email
                $contenido .= '<p>Ha elegido ser contactado por Email</p>';
                $contenido .= ' <p>Email: ' . $respuestas['email'] . ' </p>';
            }

            $contenido .= ' <p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= ' <p>Motivo del Contacto: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= ' <p>Presupuesto: ' . $respuestas['precio'] . ' €</p>';
            // $contenido .= ' <p>Prefiere ser contactado por: '. $respuestas['contacto'] . ' </p>';
            $contenido .= '</html>';
            $mail->Body = $contenido;

            //Enviar el email
            if ($mail->send()) { //el metodo send devuelve true si se envio y false si no se envio
                $mensaje =  "Mensaje enviado correctamente";
            } else {
                $error =  "El mensaje no se ha podido enviar" . $mail->ErrorInfo;
                // $mensaje =  "El mensaje no se ha podido enviar" . $mail->ErrorInfo;
            }
        }

        // Enviamos el mensaje de éxito o de error a la vista de contacto
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje,
            'error' => $error

        ]);
    }

    public static function servicio(Router $router)
    {
        $router->render('paginas/servicio', []);
    }
}
