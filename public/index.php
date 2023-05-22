<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\VendedorController;
use Controllers\ServicioController;
use Controllers\PaginasController;
use Controllers\MecanicoController;
use Controllers\LoginController;
use Controllers\CocheController;
use Controllers\CitaController;
use Controllers\BlogController;
use Controllers\AdminPanelController;
use Controllers\AdminController;
use Controllers\APIController;


$router = new Router(); // Creamos una nueva instancia de Router


//Zona Pública
$router->get('/', [PaginasController::class, 'index']); //Página principal
$router->get('/nosotros', [PaginasController::class, 'nosotros']); //Página Nosotros
$router->get('/coches', [PaginasController::class, 'coches']); //Mostramos la galería de coches
$router->get('/coche', [PaginasController::class, 'coche']); //Mostramos la info de un coche
$router->get('/blog', [PaginasController::class, 'blog']); //Página del Blog
$router->get('/entrada', [PaginasController::class, 'entrada']); //Mostramos una entrada del Blog
$router->get('/contacto', [PaginasController::class, 'contacto']); // Mostramos página Contacto
$router->post('/contacto', [PaginasController::class, 'contacto']); //usamos POST para enviar el formulario de contacto
$router->get('/servicios', [PaginasController::class, 'servicio']); //Mostramos los servicios

//Pagina de error 404
$router->get('/error', [PaginasController::class, 'error']); //Muestra la página de error 404


//****************** Login, crear cuenta, recuperar la contraseña y autenticación ********************/


//Inicio de sesión y cerrar la sesión
$router->get('/login', [LoginController::class, 'login']); //mostrar el formulario de inicio de sesión
$router->post('/login', [LoginController::class, 'login']); // Mandamos los datos del usuario
$router->get('/logout', [LoginController::class, 'logout']); // Cerramos sesión


//Recuperar la contraseña
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']); //Envío de mail al usuario para resetear la contraseña
$router->get('/recuperar', [LoginController::class, 'recuperar']); // mostrar el formulario para nueva password
$router->post('/recuperar', [LoginController::class, 'recuperar']); //Envíar nueva password

//Crear la cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']); //mostrar el formulario para crear una cuenta
$router->post('/crear-cuenta', [LoginController::class, 'crear']); //enviamos el formulario para crear la cuenta

//Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']); //mostrar la página con el mensaje de confirmar
$router->get('/mensaje', [LoginController::class, 'mensaje']); //mostrar la página con el mensaje de verificar
$router->get('/confirmacion', [LoginController::class, 'confirmacion']); //muestra la página con la confirmación del cambio de pass


// ***************************************************  Zona Protegida *************************************************** //


//Panel de Administración
$router->get('/admin', [AdminPanelController::class, 'index']);

//Zona Gestión Coches
$router->get('/coches/crear', [CocheController::class, 'crear']); //Mostramos formulario para nueva entrada de coches
$router->post('/coches/crear', [CocheController::class, 'crear']); //Enviamos formulario con los datos
$router->get('/coches/actualizar', [CocheController::class, 'actualizar']); //Mostramos el formulario con los datos de un coche determinado
$router->post('/coches/actualizar', [CocheController::class, 'actualizar']); //Actualizamos los datos de la entrada de coches que ya existe
$router->post('/coches/eliminar', [CocheController::class, 'eliminar']); // Eliminamos el registro

//Zona Gestión Vendedores
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

//Zona Gestión Mecanicos
$router->get('/mecanicos/crear', [MecanicoController::class, 'crear']);
$router->post('/mecanicos/crear', [MecanicoController::class, 'crear']);
$router->get('/mecanicos/actualizar', [MecanicoController::class, 'actualizar']);
$router->post('/mecanicos/actualizar', [MecanicoController::class, 'actualizar']);
$router->post('/mecanicos/eliminar', [MecanicoController::class, 'eliminar']);

//Zona Gestión Blog
$router->get('/blog/crear', [BlogController::class, 'crear']);
$router->post('/blog/crear', [BlogController::class, 'crear']);
$router->get('/blog/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blog/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blog/eliminar', [BlogController::class, 'eliminar']);

//Zona Gestión Servicios
$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);

//Sección de Citas para el Usuario Registrado
$router->get('/cita', [CitaController::class, 'index']);
//Sección de Citas para el Administrador
$router->get('/admincita', [AdminController::class, 'index']);

// API de citas
$router->get('/api/servicios', [APIController::class, 'index']); //Datos de los servicios disponibles
$router->post('/api/citas', [APIController::class, 'guardar']); //guarda las citas en el servidor. Registro una URL que se encargue de leer los datos que le enviamos desde el formData
$router->post('/api/eliminar', [APIController::class, 'eliminar']); //elimina las citas en el servidor

// ***************************************************  Zona Protegida *************************************************** //


$router->comprobarRutas();
