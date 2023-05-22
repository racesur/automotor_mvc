<main class="contenedor seccion">
    <!-- AÑADO DIV PARA LA BARRA FIJA -->
    <div class="barra-fija">
        <h1>Conoce más Sobre AutoMotor</h1>
    </div>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/banner5.webp" type="image/webp">
                <source srcset="build/img/banner5.avif" type="image/avif">
                <source srcset="build/img/banner5.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/banner5.jpg" alt="Sobre Nosotros">
            </picture>
        </div>

        <div class="texto-nosotros">
            <blockquote>
                30 Años de experiencia
            </blockquote>

            <p>En nuestro concesionario, creemos que el servicio al cliente es la clave del éxito en la industria
                automotriz. Por esta razón, nuestro equipo se esfuerza por brindar un servicio excepcional
                a cada uno de nuestros clientes.</p>

            <p>Ya sea que estés buscando un automóvil nuevo o usado, nuestros vendedores te guiarán a través del proceso
                de compra, respondiendo todas tus preguntas y asegurándose de que te sientas cómodo y seguro en cada
                paso del camino.</p>
        </div>
    </div>
</main>
<section class="contenedor seccion">

    <h2>Lo que encontrarás en AutoMotor</h2>
    <p>Además de nuestra amplia variedad de vehículos, en AutoMotor ofrecemos una amplia gama de servicios para ayudarte
        en todo lo que necesites. Desde el mantenimiento y reparación de automóviles hasta el financiamiento y la
        negociación de seguros, nuestro equipo de expertos está aquí para ayudarte a hacer realidad tus sueños de tener
        un automóvil.</p>

    <?php include 'iconos.php'; ?>

    <h2>Nuestro Equipo</h2>
    <p>En AutoMotor, contamos con un equipo de expertos apasionados por el mundo del automóvil. Todos nuestros empleados
        tienen un amplio conocimiento sobre los vehículos que ofrecemos y están comprometidos a brindar un excelente
        servicio al cliente. Desde nuestros vendedores hasta nuestros mecánicos, todos trabajan juntos para garantizar
        que nuestros clientes reciban la atención que merecen.</p>

    <h2>Equipo de Ventas</h2>
    <p>En nuestro concesionario, nos enorgullece contar con un equipo de vendedores expertos que están siempre
        dispuestos a ayudarte a encontrar el automóvil de tus sueños. Cada uno de ellos cuenta con años de experiencia
        en la industria del automóvil, y se esfuerza por brindar un servicio excepcional a cada uno de nuestros
        clientes.</p>
    <div class="iconos-nosotros">
        <?php foreach ($vendedores as $vendedor) : ?>
            <div class="iconos">
                <picture>
                    <img loading="lazy" src="/imagenes/<?php echo $vendedor->imagen; ?>" alt="anuncio">
                </picture>
                <h3><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></h3>
                <!-- <h2><?php //echo $vendedor->puesto; 
                            ?></h2> -->
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Equipo de Mecánicos</h2>
    <p>En nuestro concesionario, no solo nos enorgullece ofrecer una amplia selección de vehículos de calidad, sino que
        también contamos con un taller de servicio completo y un equipo de mecánicos expertos. Nuestro equipo de
        mecánicos cuenta con años de experiencia en la industria automotriz, y están siempre dispuestos a ayudarte a
        mantener tu vehículo en perfecto estado de funcionamiento. Ya sea que necesites un cambio de aceite, una
        revisión de seguridad o una reparación mayor, nuestro equipo de mecánicos está aquí para ayudarte.</p>
    <div class="iconos-nosotros">
        <?php foreach ($mecanicos as $mecanico) : ?>
            <div class="iconos">
                <picture>
                    <img loading="lazy" src="/imagenes/<?php echo $mecanico->imagen; ?>" alt="anuncio">
                </picture>
                <h3><?php echo $mecanico->nombre . " " . $mecanico->apellido; ?></h3>
                <!-- <h2><?php //echo $mecanico->puesto; 
                            ?></h2> -->
            </div>
        <?php endforeach; ?>
    </div>

    <!-- <section class="contenedor seccion"> -->
</section>
<script src="../build/js/navegacion.js"></script>