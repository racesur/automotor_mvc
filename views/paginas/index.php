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
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/coche.svg" alt="Icono mantenimiento" loading="lazy">
                <h3>Mantenimiento</h3>
                <p>Además de la venta de vehículos, también ofrecemos servicios de mantenimiento y reparación en nuestro
                    taller
                    de servicio. Nuestros mecánicos altamente capacitados y experimentados están disponibles para
                    realizar
                    reparaciones y mantenimiento programado en todos los vehículos.</p>
            </div>
            <div class="icono">
                <img src="build/img/dinero.svg" alt="Icono Precio" loading="lazy">
                <h3>Financiación</h3>
                <p>En Automotor, entendemos que la compra de un vehículo es una gran inversión. Por lo tanto, nos
                    aseguramos
                    de
                    proporcionar opciones de financiamiento flexibles y competitivas para ayudar a nuestros clientes a
                    obtener
                    el vehículo que desean al precio que pueden pagar</p>
            </div>
            <div class="icono">
                <img src="build/img/reloj.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Rapidez</h3>
                <p>En Automotor, nos comprometemos a brindar un servicio excepcional al cliente, sin hacerle perder su
                    tiempo.
                    Nuestro equipo de vendedores y
                    mecánicos están disponibles para responder cualquier pregunta que pueda tener y para proporcionar
                    asesoramiento experto.</p>
            </div>
        </div>
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