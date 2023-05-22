<main class="contenedor seccion contenido-centrado">
    <h1 class="nombre-pagina">He Olvidado la Contraseña</h1>
    <p class="descripcion-pagina">Escribe una nueva contraseña a continuación</p>


    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>

    <?php endforeach; ?>

    <!-- si se intenta manipular el TOKEN el formulario desaparecerá para evitar inyecciónSQL, por eso ponemos return -->

    <?php if ($error) return; ?>


    <form class="formulario" method="POST">
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu nueva contraseña">
        </div>

        <input type="submit" class="boton boton-amarillo-block" value="Guardar Contraseña">
    </form>

    <div class="acciones">
        <a href="/login">¿Ya estás registrado? Inicia Sesión</a><a href="/crear-cuenta">¿Aún no estás registrado? Crear
            una
            cuenta</a>
    </div>
</main>