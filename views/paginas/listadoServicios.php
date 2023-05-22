<div class="contenedor seccion contenido-centrado">
    <section class="listado-servicios">
        <?php foreach ($servicios as $servicio) : ?>
            <!-- <article class="entrada-blog">
                <div class="texto-entrada"> -->
            <article class="servicio">
                <div>
                    <h4 class="servicio-nombre"><?php echo $servicio->nombre; ?></h4>
                </div>
                <div>
                    <p class="precio-servicio"><?php echo $servicio->precio; ?> €</p>
                    <p class="servicio-descripcion"><?php echo $servicio->descripcion; ?></p>
                    <!-- </div> -->
                    <!-- <div class="texto-entrada"> -->
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</div>