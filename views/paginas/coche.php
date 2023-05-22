<main class="contenedor seccion contenido-centrado">
    <!-- AÑADO DIV PARA LA BARRA FIJA -->
    <div class="barra-fija">
        <h1><?php echo $coche->titulo; ?></h1>
    </div>
    <img loading="lazy" src="/imagenes/<?php echo $coche->imagen; ?>" alt="imagen del Coche">
    <div class="resumen-propiedad">
        <p class="precio"> <?php echo $coche->precio; ?> €</p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" loading="lazy" src="build/img/plazas.png" alt="icono ocupantes coche" />
                <p><?php echo $coche->plazas; ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/puertas.png" alt="icono puertas coche" />
                <p><?php echo $coche->puertas; ?></p>
            </li>
            <li>
                <img class="icono" loading="lazy" src="build/img/motor.png" alt="icono motor coche" />
                <p><?php echo $coche->potencia; ?></p>
            </li>
        </ul>
        <p><?php echo $coche->descripcion; ?></p>
    </div>
    <div class="alinear-derecha">
        <a href="/coches" class="boton-azul">Volver a la Galería</a>
    </div>
</main>
<script src="../build/js/navegacion.js"></script>