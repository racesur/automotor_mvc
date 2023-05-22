<fieldset>
    <legend>Datos del Nuevo Servicio</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" name="servicio[nombre]" id="nombre" placeholder="Nombre Servicio"
        value="<?php echo s($servicio->nombre); ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="servicio[precio]" id="precio" placeholder="Precio Servicio"
        value="<?php echo s($servicio->precio); ?>">

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="servicio[descripcion]"><?php echo s($servicio->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Mecánic@s</legend>
    <label for="mecanico" class="">Mecánico(a)</label>
    <select name="servicio[mecanicoId]" id="mecanico">
        <option value="" selected>-- Seleccione --</option>
        <?php foreach ($mecanicos as $mecanico) : ?>
        <option <?php echo $servicio->mecanicoId === $mecanico->id ? 'selected' : ''; ?>
            value="<?php echo s($mecanico->id); ?>">
            <?php echo s($mecanico->nombre) . " " . s($mecanico->apellido); ?>
        </option>
        <?php endforeach; ?>
    </select>
</fieldset>