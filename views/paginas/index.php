<main class="contenedor seccion">
    <!-- AÑADO DIV PARA LA BARRA FIJA -->
    <div class="barra-fija">
        <h1>Bienvenidos a AutoMotor, tu concesionario de confianza para la compra y venta de vehículos nuevos y usados
        </h1>
    </div>
    <p>En Automotor, nos enorgullecemos de ofrecer una amplia selección de vehículos de alta calidad y un servicio
        excepcional al cliente.
        Nuestro inventario de vehículos nuevos incluye una variedad de marcas y modelos de los principales
        fabricantes
        de automóviles. Desde vehículos compactos y económicos hasta deportivos y vehículos de alta gama, tenemos
        algo
        para
        satisfacer las necesidades de cada cliente. También ofrecemos una selección de vehículos usados garantizados
        y
        de alta calidad, que han sido cuidadosamente inspeccionados y reacondicionados por nuestros mecánicos de
        confianza.</p>
    <section class="imagen-contacto imagen-2">
        <h2>En AutoMotor estamos comprometidos con la calidad y la excelencia en el servicio</h2>
        <p>Trabajamos para que encuentres el coche perfecto para ti, que se adapte a tus necesidades y a tu presupuesto.
        </p>

    </section>

    <!-- <h2>Nuestros Servicios</h2> -->

    <section class="contenedor seccion">
        <h1>Lo que nos Diferencia de la Competencia</h1>

        <?php include 'iconos.php'; ?>
    </section>
</main>
<section class="seccion contenedor">
    <h2>Nuestros Vehículos Más Destacados</h2>

    <?php
    include 'listadoCoches.php';
    ?>

</section>
<div class="alinear-derecha">
    <a href="/coches" class="boton-azul">Ver Todos Los Vehículos</a>
</div>


<section class="imagen-contacto">
    <h2>Encuentra el coche de tus sueños en Automotor</h2>
    <p>Si tienes alguna pregunta o necesitas más información sobre nuestros servicios o los vehículos disponibles, no
        dudes
        en ponerte en contacto con nosotros. ¡Estaremos encantados de ayudarte!</p>
    <a href="/contacto" class="boton-amarillo">Contactános</a>
</section>

<section class="seccion contenedor">
    <h2>Algunos de los Servicios que Ofrecemos</h2>

    <?php
    include 'listadoServicios.php';
    ?>

</section>
<div class="alinear-derecha">
    <a href="/servicios" class="boton-azul">Ver Todos Los Servicios</a>
</div>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <?php
        include 'listadoBlog.php';
        ?>
    </section>
    <section class="testimoniales">
        <h3>Opiniones</h3>

        <div class="testimonial">
            <blockquote>
                El equipo de AutoMotor hizo que mi experiencia de compra fuera muy agradable. Gracias a AutoMotor, ahora
                tengo el vehículo de mis sueños.
            </blockquote>
            <p>- Andrés Valverde</p>
        </div>
    </section>
</div>
<script src="../build/js/navegacion.js"></script>