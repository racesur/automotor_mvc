<main class="contenedor seccion">
    <h1>Registrar Un(a) Vendedor@</h1>

    <a href="/admin" class="boton boton-azul">Volver</a>

    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>

    <?php endforeach; ?>

    <form class="formulario" action="/vendedores/crear" method="POST" enctype="multipart/form-data">

        <?php include 'formulario.php'; ?>

        <input type="submit" value="Registrar Vendedor(a)" class="boton boton-verde">
    </form>

</main>