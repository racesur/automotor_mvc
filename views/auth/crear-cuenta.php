<main class="contenedor seccion contenido-centrado">
    <h1 class="nombre-pagina">Crear Una Cuenta</h1>
    <p class="descripcion-pagina">Completa el siguiente formulario para crear tu nueva cuenta</p>

    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>

    <?php endforeach; ?>

    <form class="formulario" action="/crear-cuenta" method="POST">
        <fieldset>
            <legend>Datos Personales</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre"
                    value="<?php echo s($usuario->nombre); ?>">
            </div>

            <div class="campo">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido"
                    value="<?php echo s($usuario->apellido); ?>">
            </div>

            <div class="campo">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="Tu Teléfono"
                    value="<?php echo s($usuario->telefono); ?>">
            </div>

            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Tu Email"
                    value="<?php echo s($usuario->email); ?>">
            </div>

            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Tu Password">
            </div>
        </fieldset>
        <input type="submit" value="Crear Cuenta" class="boton boton-verde-block">

    </form>

    <div class="acciones">
        <a href="/login">¿Ya estás registrado? Inicia Sesión</a><a href="/olvide">¿Has olvidado tu
            contraseña?</a>
    </div>
</main>