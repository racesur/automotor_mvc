<fieldset>
    <legend>Datos Principales de la Entrada del Blog</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" name="blog[titulo]" id="titulo" placeholder="Titulo Blog"
        value="<?php echo s($blog->titulo); ?>">

    <label for="Subtitulo">Subtitulo:</label>
    <input type="text" name="blog[subtitulo]" id="subtitulo" placeholder="Subtitulo Blog"
        value="<?php echo s($blog->subtitulo); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="blog[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($blog->imagen) : ?>
    <img src="/imagenes/<?php echo $blog->imagen; ?>" class="imagen-small" alt="imagen blog">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="blog[descripcion]"><?php echo s($blog->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Autor</legend>
    <label for="vendedor" class="">Autor</label>
    <select name="blog[vendedorId]" id="vendedor">
        <option value="" selected>-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) : ?>
        <option <?php echo $blog->vendedorId === $vendedor->id ? 'selected' : ''; ?>
            value="<?php echo s($vendedor->id); ?>">
            <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
        </option>
        <?php endforeach; ?>
    </select>
</fieldset>