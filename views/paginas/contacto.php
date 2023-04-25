<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>

    <section class="seccion contenedor">
        <h2>Contáctanos hoy y haz realidad tu sueño de tener un automóvil.</h2>

        <p class="contacto-texto">En AutoMotor, estamos comprometidos a brindarte una atención al cliente de primera
            calidad. Si tienes alguna
            pregunta o comentario sobre nuestros servicios o vehículos, por favor, no dudes en ponerte en contacto con
            nosotros. Nuestro equipo de expertos está aquí para ayudarte en todo lo que necesites!</p>

    </section>
    <div class="contenedor seccion seccion-inferior-2">
        <p> <strong>Nuestros datos de Contacto:</strong></p>
        <p class="informacion-meta">
            <strong> Dirección Sede Central: </strong><br>
            <span>Calle de los Coches, 123
                28000 Madrid, España</span> <br>

            <strong> Medios de Contacto: </strong><br>
            Teléfono: <span> +34 912 345 678 </span> <br>
            Correo electrónico: <span>info@automotor.com</span> <br>

            <strong>Horario de atención al cliente:</strong> <br>
            Lunes a viernes: <span>9:00 am - 8:00 pm</span> <br>
            Sábados: <span>9:00 am - 2:00 pm</span> <br>
            Domingos: <span><strong>cerrado</strong></span>
        </p>

        <p> <strong>También puedes encontrarnos en nuestras redes sociales:</strong></p>
        <p class="informacion-meta">
            <span>Facebook: @automotor
                Instagram: @automotor_oficial
                Twitter: @automotor_es</span>
        </p>
    </div>

    <div class="contenedor seccion contenido-centrado">
        <picture>
            <source srcset="build/img/16.webp" type="image/webp">
            <source srcset="build/img/16.avif" type="image/avif">
            <source srcset="build/img/16.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/16.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Complete el formulario de Contacto</h2>
        <p class="contacto-texto informacion-meta">¡Gracias por visitar <strong>Automotor!</strong> Si tienes alguna
            pregunta o necesitas
            más información
            sobre nuestros
            servicios o
            vehículos disponibles, no dudes en ponerte en contacto con nosotros mediante el siguiente formulario de
            contacto. <br> <span><strong>¡Estamos encantados de ayudarte!</strong></span></p>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <!-- <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono"> -->

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Indica el Motivo de Contacto</legend>

                <label for="opciones">Elige uno de los motivos de contacto:</label>
                <select id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Probar">Probar un Vehículo</option>
                    <option value="Tasar">Tasar tu Vehículo</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>

            </fieldset>

            <fieldset>
                <legend>Elige el Medio de Contacto</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">


                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
                </div>
                <!-- inyectamos el html en este div que vamos a crear desde javascript -->
                <div id="contacto"></div>

                <!-- <p>Si eligió teléfono, elija la fecha y la hora</p> -->

                <!-- <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00"> -->

            </fieldset>

            <input type="submit" value="Enviar" class="boton-azul">
        </form>
    </div>
</main>