<?php

// Para evitar arrancar la sesión 2 veces, primero confirmamos con el if si no existe ninguna sesión. Si es así arrancamos la sesión
if (!isset($_SESSION)) {
    session_start();
}

// Verificamos si el usuario ha iniciado la sesión, sino toma el valor de FALSE
$auth = $_SESSION['login'] ?? false;

// Para mostrar la foto sólo en la pág ppal, Verificamos si existe la variable de inicio, sino será false y la foto no se mostrará
if (!isset($inicio)) {
    $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario AutoMotor</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; // revisamos si la variable de inicio es TRUE, entonces añade la clase 'inicio', si es FALSE no agrega nada ''. Si es FALSE la imagen no se muestra
                            ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="../build/img/logos1.svg" alt="Logotipo de Automotor">
                </a>

                <div class="mobile-menu">
                    <img class="mobile-boton" src="../build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="/coches">Coches</a>
                        <a href="/nosotros">Nosotros</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <!-- <a href="/login">Iniciar Sesión</a> -->
                        <?php if (!$auth) : ?>
                        <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                        <?php if ($auth) : ?>
                        <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div>
            <!--.barra-->
            <?php if ($inicio) { ?>
            <h1>Ven a AutoMotor y experimenta la emoción de conducir</h1>
            <?php } ?>
        </div>
    </header>

    <body>

        <?php echo $contenido; ?>

        <footer class="footer seccion">
            <div class="contenedor contenedor-footer">
                <nav class="navegacion">
                    <a href="/coches">Coches</a>
                    <a href="/nosotros">Nosotros</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>

            <p class="copyright">Todos los derechos Reservados. AutoMotor
                <?php echo date('Y'); ?> &copy;
            </p>
        </footer>
        <script src="../build/js/app.js"></script>
        <script src="../build/js/modernizr.js"></script>
    </body>

</html>