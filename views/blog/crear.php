<main class="contenedor seccion">
    <h1>Crear Una Nueva Nueva Entrada del Blog</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <a href="/admin" class="boton boton-azul">Volver</a>
    <!-- tenemos que añadir enctype porque sirve para subir archivos y queremos subir imagenes -->
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php';  ?>

        <input type="submit" value="Crear Entrada Blog" class="boton boton-verde">
    </form>

</main>