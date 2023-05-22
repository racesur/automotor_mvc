<div class="contenedor seccion contenido-centrado">
    <h1 class="nombre-pagina">Panel de Administración de Gestión de Citas</h1>

    <div class="barra-2">
        <!-- mostramos el nombre del usuario -->
        <p>Hola: <?php echo $nombre ?? ''; ?></p>
        <a class="boton-2" href="/logout">Cerrar Sesión</a>
    </div>
    <div class="barra-servicios">
        <a class="boton-2" href="/admincita">Ver Citas</a>
        <a class="boton-2" href="/admin">Ver Servicios</a>
        <a class="boton-2" href="/servicios/crear">Nuevo Servicio</a>
    </div>
    <h2>Buscar Citas</h2>
    <div class="busqueda">
        <form class="formulario">
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
            </div>
        </form>
    </div>

    <?php
    if (count($citas) === 0) {
        echo "<h2>No Hay Citas para esa fecha</h2>";
    }
    ?>

    <div id="citas-admin">
        <ul class="citas">
            <?php
            $idCita = 0;
            foreach ($citas as $key => $cita) {

                if ($idCita !== $cita->id) {
                    $total = 0;
            ?>
                    <li>
                        <p>ID: <span><?php echo $cita->id; ?></span></p>
                        <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                        <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                        <p>Email: <span><?php echo $cita->email; ?></span></p>
                        <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>

                        <h3>Servicios</h3>
                    <?php
                    $idCita = $cita->id;
                } // Fin de IF 
                $total += $cita->precio;
                    ?>
                    <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>

                    <?php
                    $actual = $cita->id;
                    $proximo = $citas[$key + 1]->id ?? 0;

                    if (esUltimo($actual, $proximo)) { ?>
                        <p class="total">Total: <span><?php echo $total; ?> €</span></p>

                        <form action="/api/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                            <input type="submit" class="boton-eliminar-2" value="Eliminar">
                            <!-- <input type="submit" class="boton-eliminar" value="Eliminar"> -->
                        </form>

                <?php }
                } // Fin de Foreach 
                ?>
                    </li>
        </ul>
    </div>
</div>
<script src='../build/js/buscador.js'></script>