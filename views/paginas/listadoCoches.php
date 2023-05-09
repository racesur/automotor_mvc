<h2>Explora nuestro amplio inventario de vehículos nuevos y usados.</h2>
<div class="contenedor-anuncios">
    <?php foreach ($coches as $coche) : ?>
        <div class="anuncio">
            <picture>
                <img loading="lazy" src="/imagenes/<?php echo $coche->imagen; ?>" alt="imagen del vehículo">
            </picture>

            <div class="contenido-anuncio">
                <h3><?php echo $coche->titulo; ?>
                </h3>
                <p class="precio">
                    <?php echo $coche->precio; ?> €
                </p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" loading="lazy" src="build/img/plazas.png" alt="icono ocupantes coche">
                        <p><?php echo $coche->plazas; ?>
                        </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/puertas.png" alt="icono puertas coche">
                        <p><?php echo $coche->puertas; ?>
                        </p>
                    </li>
                    <li>
                        <img class="icono" loading="lazy" src="build/img/motor.png" alt="icono motor coche">
                        <p><?php echo $coche->potencia; ?></p>
                    </li>
                </ul>

                <a href="/coche?id=<?php echo $coche->id; ?>" class="boton-amarillo-block">
                    Ver Más Información
                </a>
            </div>
            <!--.contenido-anuncio-->
        </div>
        <!--anuncio-->
    <?php endforeach; ?>
</div>
<!--.contenedor-anuncios-->