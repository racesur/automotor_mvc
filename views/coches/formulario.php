<fieldset>
    <legend>Información General del Anuncio</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" name="coche[titulo]" id="titulo" placeholder="Titulo coche" value="<?php echo s($coche->titulo); ?>">

    <label for="marca">Marca:</label>
    <input type="text" name="coche[marca]" id="marca" placeholder="Marca coche" value="<?php echo s($coche->marca); ?>">

    <label for="modelo">Modelo:</label>
    <input type="text" name="coche[modelo]" id="modelo" placeholder="Modelo coche" value="<?php echo s($coche->modelo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" name="coche[precio]" id="precio" placeholder="Precio coche" value="<?php echo s($coche->precio); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" name="coche[imagen]" id="imagen" accept="image/jpeg, image/png">

    <?php if ($coche->imagen) : ?>
        <img src="/imagenes/<?php echo $coche->imagen; ?>" class="imagen-small" alt="imagen coche">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="coche[descripcion]"><?php echo s($coche->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información del Vehículo</legend>

    <label for="plazas">Plazas:</label>
    <input type="number" name="coche[plazas]" id="plazas" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($coche->plazas); ?>">

    <label for="puertas">Puertas:</label>
    <input type="number" name="coche[puertas]" id="puertas" placeholder="Ej: 3" min="1" max="5" value="<?php echo s($coche->puertas); ?>">

    <label for="potencia">Potencia:</label>
    <input type="number" name="coche[potencia]" id="potencia" placeholder="Ej: 100" min="60" max="500" value="<?php echo s($coche->potencia); ?>">

</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <label for="vendedor" class="">Vendedor</label>
    <select name="coche[vendedorId]" id="vendedor">
        <option value="" selected>-- Seleccione --</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option <?php echo $coche->vendedorId === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id); ?>">
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php endforeach; ?>
    </select>
</fieldset>