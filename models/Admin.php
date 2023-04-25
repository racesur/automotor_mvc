<?php

namespace Model;

class Admin extends ActiveRecord
{
    //Base de Datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = 'La Dirección de Correo es Obligatoria'; // Generamos un mensaje de error
        }

        if (!$this->password) {
            self::$errores[] = 'La Contraseña es Obligatoria'; // Generamos un mensaje de error
        }

        return self::$errores;
    }

    //Verificamos en la BBDD si existe el usuario o no
    public function existeUsuario()
    {
        //Revisar si un usuario existe o no
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe'; // Generamos un mensaje de error
            return;
        }

        return $resultado; //en el caso de que exista el usuario devolvemos $resultado
    }

    //Verificamos en la BBDD si la contraseña es la misma que se ha escrito
    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object(); //devuelve lo que ha encontrado en la bbdd

        $autenticado = password_verify($this->password, $usuario->password); //Función de php para verificar si la password está bien, toma la pass del formulario y la compara con la pass de la bbdd. Lo hacemos así porq la pass estará hasheada. Devuelve true o false

        if (!$autenticado) {
            self::$errores[] = 'La contraseña es incorrecta'; // Generamos un mensaje de error
        }

        return $autenticado;
    }

    public function autenticar()
    {
        session_start();

        // Añadimos los datos de usuario y login al array de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        // Redirigimos al usuario al Panel de Administración
        header('Location: /admin');
    }
}
