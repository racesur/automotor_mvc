<!-- MENSAJE DE EXITO -->
<?php if ($mensaje) : ?>
    <p class="alerta exito"><?php echo s($mensaje); ?></p>
<?php endif; ?>
<!-- MENSAJE DE EXITO -->

<?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
<?php endforeach; ?>