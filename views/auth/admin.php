<main class="contenedor seccion">
    <h1>Administrador de Concesionario AutoMotor</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        //Como el valor de resultado es un string "1" lo convertimos en un entero 1 con la función intval
        if ($mensaje) : ?>
    <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php endif; ?>
    <?php } ?>

    <!-- BARRA DE BOTONES  -->
    <a href="/coches/crear" class="boton boton-amarillo">Nuevo Coche</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuev@ Vendedor@</a>
    <a href="/mecanicos/crear" class="boton boton-amarillo">Nuev@ Mecánic@</a>
    <a href="/blog/crear" class="boton boton-amarillo">Nueva Entrada Blog</a>
    <a href="/servicios/crear" class="boton boton-amarillo">Nuevo Servicio</a>
    <a href="/admincita" class="boton boton-amarillo">Gestionar Citas</a>

    <h2>Catálogo de Vehículos</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- MOSTRAR LOS RESULTADOS OBTENIDOS DE LA CONSULTA A LA BBDD COCHES-->
        <tbody>
            <?php foreach ($coches as $coche) : ?>
            <tr>
                <td> <?php echo $coche->id; ?>
                </td>
                <td> <?php echo $coche->titulo; ?>
                </td>
                <td><img src="/imagenes/<?php echo $coche->imagen; ?>" class="imagen-tabla" alt="Imagen del coche">
                </td>
                <td><?php echo $coche->precio; ?>
                    €</td>
                <td>
                    <form method="POST" class="w-100" action="/coches/eliminar">
                        <!-- Creamos un input oculto que enviará el id del registro que queremos eliminar de la bbdd -->
                        <input type="hidden" name="id" value="<?php echo $coche->id; ?>">
                        <input type="hidden" name="tipo" value="coche">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="/coches/actualizar?id=<?php echo $coche->id; ?>"
                        class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Lista de Vendedores</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Foto</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!--- MOSTRAR LOS RESULTADOS OBTENIDOS DE LA CONSULTA A LA BBDD VENDEDORES-->
        <tbody>
            <?php foreach ($vendedores as $vendedor) : ?>
            <tr>
                <td> <?php echo $vendedor->id; ?>
                </td>
                <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?>
                </td>
                <td> <?php echo $vendedor->puesto; ?>
                </td>
                <td><img src="/imagenes/<?php echo $vendedor->imagen; ?>" class="imagen-tabla" alt="foto de vendedor">
                </td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>"
                        class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Lista de Mecánicos</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Foto</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- MOSTRAR LOS RESULTADOS OBTENIDOS DE LA CONSULTA A LA BBDD MECANICOS-->
        <tbody>
            <?php foreach ($mecanicos as $mecanico) : ?>
            <tr>
                <td> <?php echo $mecanico->id; ?>
                </td>
                <td> <?php echo $mecanico->nombre . " " . $mecanico->apellido; ?>
                </td>
                <td> <?php echo $mecanico->puesto; ?>
                </td>
                <td><img src="/imagenes/<?php echo $mecanico->imagen; ?>" class="imagen-tabla" alt="Foto del mecanico">
                </td>
                <td><?php echo $mecanico->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/mecanicos/eliminar">

                        <!-- Creamos un input oculto que enviará el id del registro que queremos eliminar de la bbdd -->
                        <input type="hidden" name="id" value="<?php echo $mecanico->id; ?>">
                        <input type="hidden" name="tipo" value="mecanico">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="mecanicos/actualizar?id=<?php echo $mecanico->id; ?>"
                        class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Artículos del Blog</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- MOSTRAR LOS RESULTADOS OBTENIDOS DE LA CONSULTA A LA BBDD BLOG-->
        <tbody>
            <?php foreach ($blogs as $blog) : ?>
            <tr>
                <td> <?php echo $blog->id; ?>
                </td>
                <td> <?php echo $blog->titulo; ?>
                </td>
                <td><img src="/imagenes/<?php echo $blog->imagen; ?>" class="imagen-tabla"
                        alt="Imagen de la entrada del Blog"></td>
                <td> <?php foreach ($vendedores as $vendedor) {
                                if ($blog->vendedorId === $vendedor->id)
                                    echo $vendedor->nombre . " " . $vendedor->apellido;
                            } ?>
                </td>
                <td>
                    <form method="POST" class="w-100" action="/blog/eliminar">
                        <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                        <input type="hidden" name="tipo" value="blog">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/blog/actualizar?id=<?php echo $blog->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Catálogo de Servicios del Concesionario</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- MOSTRAR LOS RESULTADOS OBTENIDOS DE LA CONSULTA A LA BBDD SERVICIOS-->
        <tbody>
            <?php foreach ($servicios as $servicio) : ?>
            <tr>
                <td> <?php echo $servicio->id; ?></td>
                <td> <?php echo $servicio->nombre; ?></td>
                <td><?php echo $servicio->precio; ?> €</td>
                <td>
                    <form method="POST" class="w-100" action="/servicios/eliminar">
                        <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                        <input type="hidden" name="tipo" value="servicio">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>

                    <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>"
                        class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>