<div class="contenedor seccion contenido-centrado">
    <?php foreach ($blogs as $blog) : ?>
        <article class="entrada-blog">
            <div class="imagen">
                <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="imagen del Blog">
            </div>
            <div class="texto-entrada">
                <h4><?php echo $blog->titulo; ?></h4>
                <p class="informacion-meta">Escrito el: <span><?php echo $blog->creado; ?></span> por:
                    <span><?php foreach ($vendedores as $vendedor) {
                                if ($blog->vendedorId === $vendedor->id)
                                    echo $vendedor->nombre . " " . $vendedor->apellido;
                            } ?></span>
                </p>
                <p><?php echo $blog->subtitulo; ?></p>
                <a href="/entrada?id=<?php echo $blog->id; ?>" class="boton-azul-block">
                    Leer el Artículo completo
                </a>
            </div>
        </article>
    <?php endforeach; ?>
</div>