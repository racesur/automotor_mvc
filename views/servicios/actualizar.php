<main class="contenedor seccion">
    <h1>Actualizar Servicio</h1>

    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-azul">Volver</a>

    <form class="formulario" method="POST">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Actualizar Servicio" class="boton boton-verde">
    </form>
</main>