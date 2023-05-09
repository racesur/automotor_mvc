<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\MecanicoController;
use Controllers\LoginController;
use Controllers\CocheController;
use Controllers\BlogController;
use Controllers\AdminPanelController;


$router = new Router(); // Creamos una nueva instancia de Router


//Zona Pública
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/coches', [PaginasController::class, 'coches']);
$router->get('/coche', [PaginasController::class, 'coche']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']); //usamos POST para enviar el formulario de contacto
$router->get('/servicios', [PaginasController::class, 'servicio']); // mostraremos los servicios que ofrece el concesionario

//Login y autenticación
$router->get('/login', [LoginController::class, 'login']); //mostrar el formulario de inicio de sesión
$router->post('/login', [LoginController::class, 'login']); // usamos post porque queremos mandar los datos del formulario
$router->get('/logout', [LoginController::class, 'logout']);

// ***************************************  Zona Protegida ***************************************** //
$router->get('/admin', [AdminPanelController::class, 'index']);

//Zona Gestión Coches
$router->get('/coches/crear', [CocheController::class, 'crear']);
$router->post('/coches/crear', [CocheController::class, 'crear']);
$router->get('/coches/actualizar', [CocheController::class, 'actualizar']);
$router->post('/coches/actualizar', [CocheController::class, 'actualizar']);
$router->post('/coches/eliminar', [CocheController::class, 'eliminar']); // eliminar no necesita get porque no usamos formulario, no hay q mostrar nada

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

$router->comprobarRutas();
