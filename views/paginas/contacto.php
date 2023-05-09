        <main class="contenedor seccion contenido-centrado">
            <!-- AÑADO DIV PARA LA BARRA FIJA -->
            <div class="barra-fija">
                <h1>Contacto</h1>
            </div>
            <!-- Mostramos un mensaje si el correo se ha podido enviar o si ha habido un error en el envío-->
            <?php
            if ($mensaje) { ?>
            <p class='alerta exito'><?php echo $mensaje; ?></p>
            <?php } elseif ($error) { ?>
            <p class='alerta error'><?php echo $error; ?></p>
            <?php } ?>

            <section class="seccion contenedor">
                <h2>Contáctanos hoy y haz realidad tu sueño de tener un automóvil.</h2>

                <p class="contacto-texto">En AutoMotor, estamos comprometidos a brindarte una atención al cliente de
                    primera
                    calidad. Si tienes alguna
                    pregunta o comentario sobre nuestros servicios o vehículos, por favor, no dudes en ponerte en
                    contacto con
                    nosotros. Nuestro equipo de expertos está aquí para ayudarte en todo lo que necesites!</p>

            </section>
            <p> <strong>Nuestros datos de Contacto:</strong></p>
            <div class="contenedor seccion seccion-inferior-2">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d758.8767126784618!2d-3.618226676063367!3d40.464050651259036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1683196931238!5m2!1ses!2ses"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <p class="informacion-metas">
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
                <p><strong>¡Siguenos en las Redes Sociales!</strong></p>
                <p class="informacion-metas">
                    <span> <a href="www.facebook.com"><img class="icono-contacto" src="build/img/facebook.png"
                                alt="icono Facebook"> Facebook:
                            @automotor</a>
                        <a href="www.instagram.com"><img class="icono-contacto" src="build/img/instagram.png"
                                alt="icono Intagram">Instagram:
                            @automotor_oficial</a>
                        <a href="www.twitter.com"><img class="icono-contacto" src="build/img/twitter.png"
                                alt="icono Twitter">
                            Twitter: @automotor_es</a>
                    </span>
                </p>
            </div>

            <!-- <div class="contenedor seccion seccion-inferior-2">
                <p> <strong>Nuestros datos de Contacto:</strong></p>
                <p class="informacion-metas">
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
                <p><strong>Siguenos en las Redes Sociales:</strong></p>
                <p class="informacion-metas">
                    <span> <a href="www.facebook.com"><img class="icono-contacto" src="build/img/facebook.png" alt="icono Facebook"> Facebook:
                            @automotor</a>
                        <a href="www.instagram.com"><img class="icono-contacto" src="build/img/instagram.png" alt="icono Intagram">Instagram:
                            @automotor_oficial</a>
                        <a href="www.twitter.com"><img class="icono-contacto" src="build/img/twitter.png" alt="icono Twitter">
                            Twitter: @automotor_es</a>
                    </span>
                </p>
            </div> -->

            <div class="contenedor seccion contenido-centrado">
                <picture>
                    <source srcset="build/img/banner1.webp" type="image/webp">
                    <source srcset="build/img/banner1.avif" type="image/avif">
                    <source srcset="build/img/banner1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/banner1.jpg" alt="Imagen Contacto">
                </picture>

                <h2>Completa el formulario de Contacto</h2>
                <p class="contacto-texto informacion-meta">¡Gracias por visitar <strong>Automotor!</strong> Si necesitas
                    más información sobre nuestros
                    servicios o los vehículos en stock disponibles, quieres tasar o vender tu coche no dudes en ponerte
                    en contacto
                    con nosotros mediante el siguiente formulario de
                    contacto. <br> <span><strong>¡Estaremos encantados de ayudarte!</strong></span></p>
                <form class="formulario" action="/contacto" method="POST">
                    <fieldset>
                        <legend>Información Personal</legend>

                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
                    </fieldset>

                    <fieldset>
                        <legend>Indica el Motivo de Contacto</legend>

                        <label for="opciones">Elige uno de los motivos de contacto:</label>
                        <select id="opciones" name="contacto[tipo]">
                            <option value="" disabled selected>-- Seleccione --</option>
                            <option value="Probar un Vehículo">Probar un Vehículo</option>
                            <option value="Tasar un Vehículo">Tasar mi Vehículo</option>
                            <option value="Comprar un Vehículo">Comprar un Vehículo</option>
                            <option value="Vender un Vehículo">Vender mi Vehículo</option>
                        </select>

                        <label for="presupuesto">Precio o Presupuesto</label>
                        <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto"
                            name="contacto[precio]" required>

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

                    </fieldset>

                    <input type="submit" value="Enviar" class="boton-azul">
                </form>
            </div>
        </main>