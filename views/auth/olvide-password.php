<main class="contenedor seccion contenido-centrado">
    <h1 class="nombre-pagina">He olvidado la Contraseña</h1>

    <p class="descripcion-pagina">Escribe la dirección de tu correo electrónico y te enviaremos un correo con las
        instrucciones para reestablecer tu contraseña.</p>

    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/olvide" class="formulario" method="POST">
        <fieldset>
            <legend>Correo Electrónico</legend>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu Email">
            </div>
        </fieldset>
        <input type="submit" class="boton boton-amarillo-block" value="Enviar Instrucciones">
    </form>
    <div class="acciones">
        <a href="/login">¿Ya estás registrado? Inicia Sesión</a><a href="/crear-cuenta">¿Aún no estás registrado? Crear
            una
            cuenta</a>
    </div>
</main>