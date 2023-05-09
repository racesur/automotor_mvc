<?php

// Creamos constantes para el archivo de funciones
define('TEMPLATES_URL', __DIR__ . '/templates'); // Las traemos de app
define('FUNCIONES_URL', __DIR__ .  'funciones.php'); //Las traemos de app
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
        // return true;
    }
    // return false;
}

//Escapa el HTML - Sanitiza lo que escribamos en los campos de input del formulario. Le ponemos el nombre de s a la función por ahorrar palabras
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

//Validar el tipo de contenido para evitar que alguien pueda borrar otra cosa cambiando el campo value del input hidden por alguna consulta SQL
function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'coche', 'mecanico', 'blog']; //Si el valor no está en este array no se va a ejecutar

    return in_array($tipo, $tipos); //la función in_array nos permite buscar un string o un valor en un array
}

//Muestra los mensajes de información y de errores
function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Corectamente';
            break;
        case 2:
            $mensaje = 'Actualizado Corectamente';
            break;
        case 3:
            $mensaje = 'Eliminado Corectamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarORedireccionar(string $url)
{
    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); //Validamos los datos de la URL por si alguien escribe algo. De esta manera nos aseguramos que el valor de id sea un número entero

    if (!$id) {
        header("Location: $url"); // Si alguien escribe algo en la URL que no sea un número(x ejm una consulta SQL) lo redireccionaremos hacia la misma página
    }

    return $id;
}
