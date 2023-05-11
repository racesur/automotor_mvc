<fieldset>

    <legend>Información Personal del Mecánico(a)</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" name="mecanico[nombre]" id="nombre" placeholder="Nombre Mecánico(a)" value="<?php echo s($mecanico->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" name="mecanico[apellido]" id="apellido" placeholder="Apellido Mecánico(a)" value="<?php echo s($mecanico->apellido); ?>">

    <label for="telefono">Teléfono:</label>
    <input type="tel" name="mecanico[telefono]" id="telefono" placeholder="Telefono Mecánico(a)" value="<?php echo s($mecanico->telefono); ?>">

</fieldset>

<fieldset>

    <legend>Información Extra</legend>

    <label for="puesto">Puesto:</label>
    <input type="text" name="mecanico[puesto]" id="puesto" placeholder="Puesto Mecánico(a)" value="<?php echo s($mecanico->puesto); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="mecanico[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($mecanico->imagen) : ?>
        <img src="/imagenes/<?php echo $mecanico->imagen; ?>" class="imagen-small" alt="imagen mecanico(a)">
    <?php endif; ?>

</fieldset>