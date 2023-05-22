<main class="contenedor seccion contenido-centrado">
    <!-- AÑADO DIV PARA LA BARRA FIJA -->
    <div class="barra-fija">
        <h1><?php echo $blog->titulo; ?></h1>
    </div>

    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="imagen del Blog">

    <p class="informacion-meta">Escrito el: <span><?php echo $blog->creado; ?></span> por:
        <span><?php foreach ($vendedores as $vendedor) {
                    if ($blog->vendedorId === $vendedor->id)
                        echo $vendedor->nombre . " " . $vendedor->apellido;
                } ?></span>
    </p>
    <div class="resumen-propiedad">
        <p><?php echo $blog->descripcion; ?></p>
    </div>
    <div class="alinear-derecha">
        <a href="/blog" class="boton-azul">Volver al Blog</a>
    </div>
</main>
<script src="../build/js/navegacion.js"></script>