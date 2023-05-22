-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 23:13:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `automotor_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(200) NOT NULL,
  `descripcion` longtext NOT NULL,
  `creado` date NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `vendedorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `titulo`, `subtitulo`, `descripcion`, `creado`, `imagen`, `vendedorId`) VALUES
(37, ' Los mejores consejos para mantener tu coche a punto', 'Mejorar el estado de tu coche no solo te ahorrará dinero', 'Mantener tu coche en perfecto estado no solo te ahorrará dinero en reparaciones a largo plazo, sino que también garantizará tu seguridad en la carretera. Para lograrlo, te recomendamos seguir estos consejos:\r\n<ul>\r\n<li>Cambia el aceite y el filtro regularmente: El aceite lubrica y protege el motor de tu coche, pero con el tiempo se degrada y pierde sus propiedades. Para evitar daños en el motor, cámbialo cada 10.000 kilómetros o según las recomendaciones del fabricante. Además, no olvides cambiar el filtro de aceite para evitar que la suciedad se acumule en el motor.</li>\r\n<li>Revisa los neumáticos con frecuencia: Los neumáticos son el único punto de contacto entre tu coche y la carretera. Asegúrate de mantenerlos inflados según las recomendaciones del fabricante y revisa regularmente su desgaste y su alineación.</li>\r\n<li>Mantén tu coche limpio: La suciedad y la sal pueden corroer la carrocería de tu coche, así que lávalo con frecuencia y aplica cera para protegerlo. Además, no te olvides de limpiar el interior, especialmente los asientos y el salpicadero, para evitar la acumulación de bacterias y malos olores.</li>\r\n<li>Presta atención a las luces y los frenos: Revisa regularmente las luces de tu coche para asegurarte de que funcionan correctamente y cámbialas si es necesario. Además, prueba los frenos con frecuencia para detectar cualquier problema antes de que sea demasiado tarde.</li>\r\n<li>Evita los malos hábitos: Conduce con suavidad, evita acelerar y frenar bruscamente y no te olvides de revisar regularmente el nivel de líquidos de tu coche, como el refrigerante, el líquido de frenos y el líquido limpiaparabrisas.</li>', '2023-05-09', 'c6d6e0ae8ea1e05d14406c46b5a6109e.jpg', 33),
(38, ' Los coches más seguros del mercado', 'La seguridad es uno de los factores más importantes', 'En la actualidad, la seguridad es un factor primordial a la hora de elegir un coche. En este artículo, hablaremos de los coches más seguros del mercado y cómo elegir el que mejor se adapte a tus necesidades.<br>\r\nPrimero, debemos tener en cuenta que existen diferentes organismos que se encargan de evaluar la seguridad de los coches. Algunos de los más conocidos son Euro NCAP y la NHTSA. Estos organismos realizan pruebas en diferentes áreas, como la seguridad en caso de choque frontal, lateral, trasero, la seguridad para los ocupantes adultos, niños y peatones, y la seguridad en sistemas de asistencia a la conducción.<br>\r\nUna vez que hayas consultado las evaluaciones de seguridad de los diferentes modelos, debes tener en cuenta tus necesidades. Si tienes familia, un coche con una calificación alta en la seguridad de los ocupantes infantiles es importante. Si haces muchos viajes por carretera, la seguridad en caso de choque frontal y la seguridad en sistemas de asistencia a la conducción como el control de crucero adaptativo pueden ser decisivos.<br>\r\nPor último, no olvides que la seguridad no es solo una cuestión de equipamiento del coche, sino también de tu propio comportamiento al volante. Respetar las normas de tráfico, no distraerse mientras se conduce y conducir de forma defensiva son fundamentales para mantener tu seguridad y la de los demás.', '2023-05-09', '208aaa4f606361695ce39841ee94d7d2.jpg', 36),
(39, ' Ventajas y desventajas de los distintos combustibles', 'Exploraremos los diferentes tipos de combustibles y sus características', 'En el mercado existen diferentes tipos de combustibles, cada uno con sus ventajas y desventajas. En este artículo, exploraremos los diferentes tipos de combustibles y sus características.<br>\r\nLa gasolina es el combustible más común y utilizado en todo el mundo. Es fácil de encontrar y tiene un precio razonable, pero también es un combustible fósil que genera emisiones de CO2 y otros gases contaminantes. Además, su rendimiento en términos de eficiencia energética no es muy alto.<br>\r\nEl diésel es otro combustible fósil utilizado en todo el mundo. Es más eficiente que la gasolina y emite menos CO2, pero también emite óxidos de nitrógeno (NOx) y partículas contaminantes que pueden ser perjudiciales para la salud.<br>\r\nLos coches eléctricos utilizan baterías eléctricas en lugar de combustibles fósiles. Son muy eficientes en términos de energía y no emiten CO2 ni otros gases contaminantes, pero su autonomía todavía es limitada y requieren una infraestructura de carga adecuada.<br>\r\nPor último, existen los híbridos, que combinan un motor eléctrico con un motor de combustión interna. Son más eficientes que los motores de combustión interna solos y emiten menos CO2, pero todavía utilizan combustibles fósiles y su eficiencia depende del tipo de uso que se les dé.', '2023-05-09', '8633410da06fb12242b59bf68961a059.jpg', 37),
(40, ' Los coches más ecológicos del mercado', 'Los más ecológicos y su impacto en el medio ambiente', 'En los últimos años, la preocupación por el medio ambiente ha llevado a los fabricantes de automóviles a desarrollar coches cada vez más ecológicos y eficientes. En este artículo, vamos a hablar de los coches más ecológicos del mercado y su impacto en el medio ambiente.<br>\r\nEn primer lugar, es importante destacar que los coches más ecológicos del mercado son los eléctricos y los híbridos enchufables. Estos vehículos no emiten gases contaminantes y son muy eficientes en cuanto a consumo de energía.<br>\r\nEntre los coches eléctricos, destacan modelos como el Tesla Model S, el Nissan Leaf y el BMW i3. Estos coches tienen una autonomía que va desde los 200 a los 500 km, dependiendo del modelo. Además, su bajo consumo de energía y su ausencia de emisiones contaminantes los convierten en la opción más ecológica del mercado.<br>\r\nPor otro lado, los híbridos enchufables combinan un motor eléctrico con uno de combustión, lo que les permite una mayor autonomía y una mayor eficiencia energética. Modelos como el Toyota Prius o el Mitsubishi Outlander PHEV son líderes en este segmento.<br>\r\nAdemás de los eléctricos y los híbridos enchufables, existen también coches híbridos convencionales que funcionan con gasolina y electricidad, como el Toyota Yaris Hybrid o el Honda CR-V Hybrid. Aunque no son tan eficientes como los eléctricos o los híbridos enchufables, son una opción más ecológica que los coches convencionales que funcionan únicamente con gasolina o diésel.<br>\r\nEn cuanto al impacto de los coches más ecológicos en el medio ambiente, es evidente que su uso ayuda a reducir la emisión de gases contaminantes y, por tanto, a mejorar la calidad del aire. Además, su eficiencia energética les permite un menor consumo de recursos naturales, como el petróleo, lo que contribuye a la conservación de los recursos del planeta.<br>\r\nEn conclusión, si estás buscando un coche ecológico y eficiente, los modelos eléctricos y los híbridos enchufables son la mejor opción. Además de su bajo impacto en el medio ambiente, su conducción es silenciosa y suave, ofreciendo una experiencia de conducción única.', '2023-05-09', '2a078b4bd4f2f63f984fa4e68bae294e.jpg', 36),
(41, ' El renting de coches: ¿una buena opción para ti?', 'El renting de coches se ha convertido en una opción popular', 'El renting de coches se ha convertido en una opción popular para muchas personas que buscan un coche nuevo sin tener que invertir una gran cantidad de dinero de una vez. El renting de coches es un servicio de alquiler a largo plazo, que te permite tener un coche nuevo durante un período determinado, generalmente de 2 a 4 años, a cambio de una cuota mensual.<br>\r\nEl renting de coches ofrece muchas ventajas sobre la compra de un coche. En primer lugar, no tienes que hacer un gran desembolso de dinero de una sola vez, sino que puedes pagar una cuota mensual que incluye todos los gastos de mantenimiento, reparación y seguro del coche. Además, al final del contrato, puedes cambiar el coche por otro modelo más nuevo.<br>\r\nOtra ventaja del renting de coches es que te permite tener un coche nuevo sin preocuparte por su depreciación. Al final del contrato, no tendrás que preocuparte por vender el coche o cambiarlo, sino que simplemente lo devolverás a la compañía de renting. Sin embargo, debes tener en cuenta que el renting de coches no es una opción de compra, y al final del contrato no tendrás la propiedad del vehículo.<br>\r\nEn conclusión, el renting de coches puede ser una buena opción para ti si buscas un coche nuevo sin hacer un gran desembolso de dinero de una sola vez, y si no te importa no tener la propiedad del vehículo. Sin embargo, debes tener en cuenta los costos y beneficios a largo plazo antes de tomar una decisión.', '2023-05-09', '254a9a9b6aaa4ae7c47e0799c9feb06c.jpg', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `usuarioId`) VALUES
(27, '2023-05-30', '11:00:00', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citasservicios`
--

CREATE TABLE `citasservicios` (
  `id` int(11) NOT NULL,
  `citaId` int(11) NOT NULL,
  `servicioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `citasservicios`
--

INSERT INTO `citasservicios` (`id`, `citaId`, `servicioId`) VALUES
(11, 27, 6),
(10, 27, 8),
(12, 27, 9),
(9, 27, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `puertas` tinyint(1) NOT NULL,
  `plazas` tinyint(1) NOT NULL,
  `potencia` int(3) NOT NULL,
  `descripcion` longtext NOT NULL,
  `vendedorId` int(11) NOT NULL,
  `creado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `titulo`, `marca`, `modelo`, `precio`, `imagen`, `puertas`, `plazas`, `potencia`, `descripcion`, `vendedorId`, `creado`) VALUES
(28, ' Nuevo BMW GTI', 'BMW', 'GTI', '26500.00', 'eb190e6a51ca90793e478a63757c7be1.jpg', 5, 5, 110, 'El BMW GTI es un modelo compacto de cinco puertas, diseñado para combinar eficiencia y versatilidad con un alto nivel de equipamiento.<br> Con un consumo de combustible de 5,8 litros cada 100 km, es una opción económica para los conductores que quieren minimizar su impacto en el medio ambiente y en su bolsillo.<br> El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, cámara trasera, climatizador automático bizona y faros LED para mejorar la visibilidad en condiciones de poca luz.<br> Con un precio de 26.500€, es una opción atractiva para los conductores que buscan un coche compacto, bien equipado y eficiente.', 33, '2023-05-09'),
(29, ' Nuevo BMW Serie 3', 'BMW', 'Serie 3', '35000.00', '05ccba31c7a9a7e691aa1c80fba7ea7b.jpg', 3, 4, 210, 'El BMW Serie 3 es un sedán de cuatro puertas diseñado para ofrecer un alto nivel de confort y rendimiento. Con un motor diesel de 2.0 litros y cuatro cilindros, este coche ofrece un consumo de combustible de 6,5 litros cada 100 km, lo que lo hace adecuado para conductores que buscan un coche potente y eficiente.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, cámara trasera, climatizador automático bizona y asientos deportivos, diseñados para ofrecer una experiencia de conducción deportiva y cómoda.<br>Con un precio de 35.000€, este coche es una opción interesante para los conductores que buscan un sedán elegante y deportivo.', 34, '2023-05-09'),
(30, ' Nuevo Ford GTI', 'Ford', 'GTI', '49500.00', '63517abbc745589b8cfb6b10183ab11c.jpg', 5, 5, 220, 'El Ford es un coche compacto diseñado para ofrecer un alto nivel de eficiencia y comodidad. Con un motor de gasolina de 1.0 litros y tres cilindros, este coche ofrece un consumo de combustible de 5,4 litros cada 100 km, lo que lo convierte en una opción atractiva para los conductores que buscan reducir sus costos de combustible.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, climatizador automático y cámara trasera para facilitar las maniobras en espacios reducidos. Con un precio de 49.500€, el Ford es una opción interesante para los conductores que buscan un coche compacto y eficiente con un equipamiento adecuado.', 35, '2023-05-09'),
(31, ' Nuevo Audi A6', 'Audi', 'A6', '75000.00', '002661a0bd3a33ae968ee9dffe881a04.jpg', 5, 5, 230, 'El Audi A6 es un sedán de lujo diseñado para ofrecer una experiencia de conducción de alta calidad. Con un motor diesel de 2.0 litros y cuatro cilindros, este coche ofrece un consumo de combustible de 6,2 litros cada 100 km, lo que lo hace adecuado para conductores que buscan un coche potente y eficiente.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, climatizador automático, cámara trasera, faros LED y tapicería de cuero para ofrecer una experiencia de conducción de lujo.<br>Con un precio de 75.000€, el Audi A6 es una opción atractiva para los conductores que buscan un coche de lujo con un alto nivel de equipamiento y un rendimiento potente.', 36, '2023-05-09'),
(32, ' Nuevo Renault TDR', 'Renault', 'TDR', '55000.00', '4b72116a0c9ea1eb14d8340db445cd89.jpg', 5, 5, 180, 'El Renault TDR es un coche compacto diseñado para ofrecer un alto nivel de eficiencia y comodidad. Con un motor de gasolina de 1.0 litros y tres cilindros, este coche ofrece un consumo de combustible de 5,3 litros cada 100 km, lo que lo convierte en una opción atractiva para los conductores que buscan reducir sus costos de combustible.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, climatizador automático y cámara trasera para facilitar las maniobras en espacios reducidos.<br>Con un precio de 18.000€, el Renault Clio es una opción interesante para los conductores que buscan un coche compacto y eficiente con un equipamiento adecuado.', 36, '2023-05-09'),
(33, ' Nuevo BMW Serie 6', 'BMW', 'Serie 6', '110000.00', '773a9647bde4c74b8863f706eaa82082.jpg', 3, 4, 230, 'El BMW Serie 6 es un sedán de lujo diseñado para ofrecer una experiencia de conducción de alta calidad. Con un motor diésel de 2.0 litros y cuatro cilindros, este coche ofrece un consumo de combustible de 5,8 litros cada 100 km, lo que lo hace adecuado para conductores que buscan un coche potente y eficiente.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, climatizador automático, cámara trasera, faros LED y tapicería de cuero para ofrecer una experiencia de conducción de lujo.<br>Con un precio de 50.000€, el BMW Serie 3 es una opción atractiva para los conductores que buscan un coche de lujo con un alto nivel de equipamiento y un rendimiento potente.', 38, '2023-05-09'),
(34, ' Nuevo Audi A5', 'Audi', 'A5', '82500.00', '2d7dd56dde65f5d7749330e70c8d40b3.jpg', 5, 5, 210, 'El Audi A5 es un sedán de cuatro puertas diseñado para ofrecer un alto nivel de confort y lujo. Con un motor diésel de 2.0 litros y cuatro cilindros, este coche ofrece un consumo de combustible de 6,2 litros cada 100 km, lo que lo hace adecuado para conductores que buscan un coche potente y eficiente.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, cámara trasera, faros LED y tapicería de cuero para ofrecer una experiencia de conducción de lujo.<br>Con un precio de 82.500€, el Audi A5 es una opción atractiva para los conductores que buscan un sedán de lujo con un alto nivel de equipamiento.', 33, '2023-05-09'),
(35, ' Nuevo Mercedes Clase A', 'Mercedes-Benz', 'Clase A', '88000.00', 'a71bca835f1be581728aa4a22db7788c.jpg', 3, 4, 240, 'El Mercedes-Benz Clase A es un coche compacto de lujo diseñado para ofrecer un alto nivel de comodidad y rendimiento.<br>Con un motor gasolina de 2.0 litros y cuatro cilindros, este coche ofrece un consumo de combustible de 6,5 litros cada 100 km, lo que lo hace adecuado para conductores que buscan un coche potente y eficiente.<br>El equipamiento incluye una pantalla táctil para el sistema de infoentretenimiento, cámara trasera, faros LED y tapicería de cuero para ofrecer una experiencia de conducción de lujo. Con un precio de 88.000€, el Mercedes-Benz Clase A es una opción atractiva para los conductores que buscan un coche compacto de lujo con un alto nivel de equipamiento.', 35, '2023-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanicos`
--

CREATE TABLE `mecanicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `mecanicos`
--

INSERT INTO `mecanicos` (`id`, `nombre`, `apellido`, `puesto`, `telefono`, `imagen`) VALUES
(17, ' Manuel', 'Martínez Rodríguez', 'Jefe de taller', '956563251', 'd13b2368e74c657b9dfb389160889cf7.jpg'),
(18, ' Javier', 'García Moreno', 'Mecánico', '587569842', '5b917e7913edad4c0b5364de8fa1b474.jpg'),
(19, ' Laura', 'Sánchez Rodríguez', 'Mecánica', '658652654', 'aaf516f69116bc133a123e56706e714d.jpg'),
(20, ' Carmen', 'García Fernández', 'Mecánica', '754215365', '92fe0ac78d1ba067d00f0b9f9e7569f2.jpg'),
(21, ' Paula', 'Torres García', 'Mecánica', '685693664', 'd52559169cd6085ba9021939edc1ac2b.jpg'),
(22, ' Francisco', 'Jiménez García', 'Mecánico', '655451235', 'e04fee13e3a67c285e924fd38e685e49.jpg ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `mecanicoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `precio`, `descripcion`, `mecanicoId`) VALUES
(1, ' Cambio de aceite y filtro', '50.00', 'Servicio de mantenimiento esencial para el correcto funcionamiento del motor. Incluye la sustitución del aceite y el filtro de aceite', 17),
(2, ' Cambio de la correa de distribución', '450.00', 'Servicio recomendado cada 100.000 kilómetros para evitar averías graves en el motor. Incluye la sustitución de la correa y la puesta a punto del sistema de distribución', 18),
(3, ' Cambio de neumáticos', '425.00', 'Cambio de los cuatro neumáticos. Servicio indispensable para garantizar la seguridad en la carretera. Incluye la sustitución de los neumáticos desgastados y el equilibrado de las ruedas', 19),
(4, ' Cambio de los frenos delanteros', '230.00', 'El precio es solo para el cambio de los frenos delanteros. Servicio importante para la seguridad en la conducción. Incluye la sustitución de las pastillas y/o discos de freno y el purgado del sistema', 20),
(5, ' Cambio de frenos delanteros y traseros', '400.00', 'El precio es por el cambio de los 4 frenos. Servicio importante para la seguridad en la conducción. Incluye la sustitución de las pastillas y/o discos de freno y el purgado del sistema', 20),
(6, ' Cambio de la batería', '85.00', 'Servicio para garantizar el correcto funcionamiento del sistema eléctrico del coche. Incluye la sustitución de la batería y la comprobación del alternador', 21),
(7, ' Reparación del sistema de refrigeración', '175.00', 'Servicio necesario para evitar el sobrecalentamiento del motor. Incluye la reparación de fugas, la sustitución del líquido refrigerante y la comprobación del termostato', 22),
(8, ' Diagnóstico informático de averías', '50.00', 'Servicio para detectar problemas mecánicos y electrónicos en el coche. Incluye la realización de pruebas y la lectura de códigos de error', 17),
(9, ' Reparación del sistema de escape', '110.00', 'Servicio para garantizar el correcto funcionamiento del sistema de escape y reducir las emisiones contaminantes. Incluye la reparación de fugas y la sustitución de silenciadores o catalizadores', 18),
(10, ' Cambio del líquido de frenos', '65.00', 'Servicio para garantizar un frenado eficaz y seguro. Incluye la sustitución del líquido de frenos y la purga del sistema', 19),
(11, ' Cambio de los amortiguadores', '400.00', 'El precio incluye el cambio de los cuatro amortiguadores. Servicio para garantizar la estabilidad y el confort en la conducción. Incluye la sustitución de los amortiguadores y la comprobación del sistema de suspensión', 19),
(12, ' Reparación del sistema de dirección', '215.00', 'Servicio para garantizar un manejo seguro y suave del coche. Incluye la reparación de fugas, la sustitución de piezas y la comprobación del sistema de dirección', 20),
(13, ' Limpieza de los inyectores', '85.00', 'Servicio para garantizar un funcionamiento óptimo del motor y reducir el consumo de combustible. Incluye la limpieza de los inyectores y la comprobación del sistema de combustible', 21),
(14, ' Reparación del sistema de aire acondicionado', '150.00', 'Servicio necesario para mejorar la climatización interior del vehículo. Incluye la reparación de fugas, la sustitución del gas refrigerante y la comprobación del climatizador', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` char(60) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `token` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `telefono`, `admin`, `confirmado`, `token`) VALUES
(1, 'admin', 'admin', 'correo@correo.com', '$2y$10$koKz2BM2APvgfSpp7wgwyOnMJnM4H5vD0P5hc6edU35yWMau/J286', '', 1, 1, ''),
(11, ' raul', 'antelo', 'correo2@correo.com', '$2y$10$dNubaHCxI1/ISUqbK.A6n..FJ3y8ilumUCFGfVjQah4VNXKbPipiW', '421321546', 0, 1, ''),
(12, ' Usuario', 'Sin Confirmar', 'correo3@correo.com', '$2y$10$vxXNjKdR0YiyiYQ0BtB9R.UBpXy1Ze.bPQ5PAdSFaV9qzPAl7nf/2', '546213879', 0, 0, '64626713b6fc1'),
(15, ' usuario', 'cuatro', 'correo4@correo.com', '$2y$10$Ev5tztxosts48e7YrwoWguctIFrleAeP/7zK3eprg8SuwCFZ6zl5C', '695521251', 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`id`, `nombre`, `apellido`, `puesto`, `telefono`, `imagen`) VALUES
(33, ' Ana', 'Rodríguez Pérez', 'Jefa de Ventas', '851121245', '70a225b1ec23967f563c7bc06ee3079c.jpg'),
(34, ' Marta', 'Gómez Fernández', 'Vendedora', '844452126', '7ff0d90998586d73be2788b9bce827c9.jpg'),
(35, ' Carlos', 'López García', 'Vendedor', '844556569', 'f041f046ae3598fc8bdc9149521379c1.jpg'),
(36, ' David', 'Martínez Jiménez', 'Vendedor', '852863841', 'bfb8ef0a4b66949a06b3be0d27ae7b94.jpg'),
(37, ' Ana Belén', 'Pérez Díaz', 'Vendedora', '574698325', '30e197dc5f9a54637847c9e785e878b3.jpg'),
(38, ' Sergio', 'Pérez Fernández', 'Vendedor', '852252325', '1f5280905295e57d985a7ae9669f70dc.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedorId` (`vendedorId`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indices de la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citaId` (`citaId`,`servicioId`),
  ADD KEY `servicioId` (`servicioId`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedorId` (`vendedorId`);

--
-- Indices de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mecanicoId` (`mecanicoId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `mecanicos`
--
ALTER TABLE `mecanicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citasservicios`
--
ALTER TABLE `citasservicios`
  ADD CONSTRAINT `citasservicios_ibfk_1` FOREIGN KEY (`citaId`) REFERENCES `citas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citasservicios_ibfk_2` FOREIGN KEY (`servicioId`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `coches`
--
ALTER TABLE `coches`
  ADD CONSTRAINT `coches_ibfk_1` FOREIGN KEY (`vendedorId`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`mecanicoId`) REFERENCES `mecanicos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
