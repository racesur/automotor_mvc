<?php

//! ARCHIVO PARA AÑADIR EL USUARIO ADMIN A LA BBDD -- BORRAR DESPUÉS DE AÑADIRLO!!!

//** 1.- IMPORTAMOS LA CONEXIÓN */
require 'includes/config/database.php';
$db = conectarDB();

//** 2.- CREAMOS UN EMAIL Y PASSWORD PARA EL ADMIN */
$email = "correo@correo.com";
$password = "123456";

// $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Función de PHP para hashear password con dos argumentos, uno es la contraseña y otro es el algoritmo que se usará
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

//** 3.- QUERY PARA CREAR AL USUARIO */
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

// exit;
//** 4.- LO AGREGARMOS A LA BBDD */
mysqli_query($db, $query);
