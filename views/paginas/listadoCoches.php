<h2>Explora nuestro amplio inventario de vehículos nuevos y usados.</h2>
<div class="contenedor-anuncios">
    <?php foreach ($coches as $coche) : ?>
    <div class="anuncio">
        <picture>
            <source srcset="build/img/11.webp" type="image/webp" />
            <source srcset="build/img/11.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/11.jpg" alt="anuncio" />
        </picture>

        <div class="contenido-anuncio">
            <h3><?php echo $coche->titulo; ?>
            </h3>
            <p><?php echo $coche->descripcion; ?>
            </p>
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
                    <p><?php echo $coche->potencia; ?>
                    </p>
                </li>
            </ul>

            <a href="/coche?id=<?php echo $coche->id; ?>" class="boton-amarillo-block">
                Ver Coche
            </a>
        </div>
        <!--.contenido-anuncio-->
    </div>
    <!--anuncio-->
    <?php endforeach; ?>
</div>
<!--.contenedor-anuncios-->