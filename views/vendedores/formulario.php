<fieldset>
    <legend>Información Personal del Vendedor(a)</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor(a)" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido Vendedor(a)" value="<?php echo s($vendedor->apellido); ?>">

    <label for="telefono">Teléfono:</label>
    <input type="tel" name="vendedor[telefono]" id="telefono" placeholder="Telefono Vendedor(a)" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="puesto">Puesto:</label>
    <input type="text" name="vendedor[puesto]" id="puesto" placeholder="Nombre Puesto" value="<?php echo s($vendedor->puesto); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="vendedor[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($vendedor->imagen) : ?>
        <img src="/imagenes/<?php echo $vendedor->imagen; ?>" class="imagen-small" alt="imagen vendedor">
    <?php endif; ?>

</fieldset>