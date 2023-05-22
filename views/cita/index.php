<div class="contenedor seccion contenido-centrado">
    <h1 class="nombre-pagina">Solicitar Una Cita</h1>
    <p class="descripcion-pagina">Elige los servicios y rellena el formulario para agendar una cita</p>

    <div class="barra-2">
        <h4>Hola: <?php echo $nombre ?? ''; ?></h4>
        <a class="boton-2" href="/logout">Cerrar Sesión</a>
    </div>

    <div class="app">
        <nav class="tabs">
            <!-- con data- podemos personalizar nuestros propios atributos, así que creamos los atributos data-paso para que al pulsar se muestren los divs correspondientes -->
            <button class="actual" type="button" data-paso="1">Servicios</button>
            <button type="button" data-paso="2">Información Cita</button>
            <button type="button" data-paso="3">Resumen</button>
        </nav>
        <div id="paso-1" class="seccion2">
            <h2>Servicios</h2>
            <p class="descripcion-pagina text-center">Estos son los servicios que tenemos disponibles actualmente en
                nuestro taller: </p>
            <div id="servicios" class="listado-servicios"></div>
        </div>
        <div id="paso-2" class="seccion2">
            <h2>Tus Datos y Cita</h2>
            <p class="text-center">A continuación, completa el formulario con la fecha y la hora para tu
                cita</p>
            <form class="formulario">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" value="<?php echo $nombre; ?>" class="" placeholder="Tu nombre" disabled>
                </div>

                <div class="campo">
                    <label for="fecha">Fecha</label>
                    <input id="fecha" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                </div>

                <div class="campo">
                    <label for="hora">Hora</label>
                    <input id="hora" type="time">
                </div>
                <!-- creo un campo oculto para obtener el id del usuario -->
                <input type="hidden" id="id" value="<?php echo $id; ?>">

            </form>
        </div>
        <div id="paso-3" class="seccion2 contenido-resumen">
            <h2>Resumen</h2>
            <p class="text-center">Por favor, verifica que la información sea correcta</p>
        </div>

        <div class="paginacion">
            <button id="anterior" class="boton-2">&laquo; Anterior</button>
            <button id="siguiente" class="boton-2">Siguiente &raquo;</button>
        </div>
    </div>
</div>
<script src="../build/js/citas.js"></script>