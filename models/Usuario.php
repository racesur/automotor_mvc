<?php

namespace Model;

class Usuario extends ActiveRecord
{
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    //Los ponemos public para poder acceder a ellos desde la clase o desde el objeto instanciado
    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En caso de que no esté presente tendrá un valor de null
        $this->nombre = $args['nombre'] ?? ''; //En caso de que no esté presente tendrá un valor de string vacío
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? "0";
        $this->confirmado = $args['confirmado'] ?? "0";
        $this->token = $args['token'] ?? '';
    }

    //Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta()
    {

        if (!$this->nombre) {
            self::$errores[] = 'El Nombre es Obligatorio';
        }

        if (!$this->apellido) {
            self::$errores[] = 'El Apellido es Obligatorio';
        }

        if (!$this->email) {
            self::$errores[] = 'El Correo Electrónico es Obligatorio';
        }

        if (!$this->password) {
            self::$errores[] = 'La Contraseña es Obligatoria';
        }

        if (!$this->telefono) {
            self::$errores[] = 'El Teléfono es Obligatorio';
        }

        if (strlen($this->password) < 6) {
            self::$errores[] = 'La contraseña debe tener más de 5 caracteres';
        }

        return self::$errores;
    }

    //Antiguo método validar()
    //Mensajes de validación para la creación de una cuenta
    //No recibe nada porque ya tenemos un objeto con información de email y password
    public function validarLogin()
    {
        //Verificamos que exista el email
        if (!$this->email) {
            self::$errores[] = 'La Dirección de Correo Electrónico es Obligatoria'; // Generamos un mensaje de error
        }

        //Verificamos que exista el password
        if (!$this->password) {
            self::$errores[] = 'La Contraseña es Obligatoria'; // Generamos un mensaje de error
        }

        //mandamos el error al controlador
        return self::$errores;
    }

    //método para validar que el campo de email no esté vacío en recuperar
    public function validarEmail()
    {
        if (!$this->email) {
            self::$errores[] = 'El Correo Electrónico es Obligatorio';
        }
        return self::$errores; //mandamos la alertas al controlador
    }


    //Función para validar el password cuando se recupera
    public function validarPassword()
    {
        //Verificamos que el campo password no esté vacío
        if (!$this->password) {
            self::$errores[] = 'La Contraseña es Obligatoria';
        }
        //Verificamos la longitud del password
        if (strlen($this->password) < 6) {
            self::$errores[] = 'La Contraseña debe tener más de 5 caracteres';
        }
        return self::$errores; //mandamos la alertas al controlador
    }


    //Verificamos en la BBDD si existe el usuario o no
    public function existeUsuario()
    {
        //Consulta a la BBDD para comprobar el correo del usuario
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        //Ejecuto la consulta
        $resultado = self::$db->query($query);

        //Si hay algún resultado significa que el correo del usuario existe
        // if (!$resultado->num_rows) {
        //     self::$errores[] = 'El usuario no existe'; // Generamos un mensaje de error
        //     return;
        // }
        if ($resultado->num_rows) {
            self::$errores[] = 'El usuario ya existe'; // Generamos un mensaje de error

        }

        return $resultado; //en el caso de que exista el usuario devolvemos $resultado
    }

    //Método para hashear la contraseña del usuario
    public function hashPassword()
    {
        //Hashear el password del usuario
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


    //Método para crear un token que verifique la cuenta del usuario
    public function crearToken()
    {
        //Generar un Token
        $this->token = uniqid(); //uniqid genera un identificador único que usaremos de token para confirmar la cuenta de correo
    }

    // Método para comprobar si la contraseña es correcta y si la cuentá está confirmada
    public function comprobarPasswordAndVerificado($password)
    {
        $resultado = password_verify($password, $this->password);
        //Verificamos si el usuario ha verificado su cuenta o el resultado de la contraseña el false
        if (
            !$resultado || !$this->confirmado
        ) {
            self::$errores[] = 'La contraseña no es correcta o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }


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

        // Añadimos los datos de usuario de email y nombre y login al array de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['nombre'] = $this->nombre;
        $_SESSION['login'] = true;

        // Redirigimos al usuario al Panel de Administración
        header('Location: /admin');
    }
}