<?php

namespace Model;

class ActiveRecord
{
    //Base de Datos
    protected static $db;
    protected static $columnasDB = []; //Con esto mapeamos los datos para que se emparejen con las columnas de la bbdd
    protected static $tabla = '';


    //Errores
    protected static $errores = [];

    // Definir la conexión a  la BBDD
    public static function setDB($database)
    {
        self::$db = $database; // La conexión la establece la clase padre evitando realizar una conexión por cada clase
    }

    // Validacion
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = []; //Cada vez que validemos limpiaremos el array de errores
        return static::$errores;
    }

    //Lista todos los registros que tenemos en la BBDD
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla; //static buscará el valor del atributo en la clase donde se esté heredando

        // $resultado = self::$db->query($query); //funciona pero necesitamos objetos
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene un determinado número de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        // $resultado = self::$db->query($query); //funciona pero necesitamos objetos
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Consulta genérica de SQL (Método para realizar el buscador de coches)
    public static function SQL($query)
    {
        $resultado = self::consultarSQL($query);
        //Devolvemos toda los datos de la consulta a la bbdd
        return $resultado;
    }

    // Busca un registro en una columna y por un valor que será lo que busquemos
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE $columna = '$valor'";
        $resultado = self::consultarSQL($query);
        //Devuelve el primer resultado de la consulta a la bbdd
        return array_shift($resultado);
    }

    //Busca un registro en la BBDD por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    // Consultamos los datos de la BBDD y mostramos los resultados como objetos
    public static function consultarSQL($query)
    {
        //Consultar la BBDD
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro); //rellenamos el array con los objetos que hemos creado a partir de los resultados de la base de datos
        }

        //Liberar la memoria
        $resultado->free(); //Para liberar la memoria

        //Devolver los resultados
        return $array;
    }

    //Creamos los objetos a partir de los resultados obtenidos de la BBDD
    protected static function crearObjeto($registro)
    {
        $objeto = new static(); // Crea nuevos objetos de la clase Propiedad con todos los campos-> id, titutlo, etc..

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) { //Compara 2 objetos, uno es el nuevo objeto creado y otro es el key, y vamos a verificar si este nuevo objeto tiene un key llamado 'id', 'titulo', etc.. entonces le asignará el valor o value -- Mapea los datos
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario cuando actualiza los datos en el formulario
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) { //Revisa, del objeto actual this que está en el formulario de actualizar, que la propiedad guardada en key exista y que la propieda o atributo no esté vacío (de ahí que pongamos que no sea null su valor, porque al actualizar un registro pueden dejar un campo en blanco y nosotros hemos puesto una condición en el fichero actualizar para que si está vacío que ponga null así-->$args['titulo'] = $_POST['titulo'] ?? null<-- que está en el archivo actualizar)
                $this->$key = $value;
            }
        }
    }


    //** METODOS PARA INTERACTUAR CON LA BBDD */


    public function guardar()
    {
        if (!is_null($this->id)) {
            // Si tenemos el dato de id es que existe una entrada en la bbdd así q estamos actualizando -> llamamos al método actualizar
            $this->actualizar();
        } else {
            // Si no tenemos el dato de id de la BBDD es que estamos creando un nuevo registro en la bbdd -> llamamos al método crear
            $this->crear();
        }
    }

    public function crear()
    {
        //Sanitizar los datos del formulario
        $atributos = $this->sanitizarAtributos();

        // Insertar los datos en la BBDD
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            //**Redireccionamos al usuario para evitar duplicar entradas del formulario

            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar()
    {
        //Sanitizar los datos del formulario
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "$key='$value'";
        }
        // Consulta para actualizar en la BBDD, usamos escape_string para evitar inyeccSQL y limitamos la búsqueda a 1 por si acaso
        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            //Redireccionamos al usuario
            header('Location: /admin?resultado=2');
        }
    }

    //Eliminar un registro de la BBDD
    public function eliminar()
    {
        //** ELIMINAR EL REGISTRO DE LA BBDD */
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1"; // Usamos escape porque estamos leyendo el id y alguien puede escribir código malicios y limite 1 para que sólo elimine 1 registro

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    //Identifica y une los atributos de la BBDD con los datos introducidos en el formulario
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') { // Con este código le estamos diciendo que ignore el valor de id, cuando columna = id le dice --> continue y así lo ignora
                continue;
            }
            $atributos[$columna] = $this->$columna; //lleva $columna porque es una variable del foreach
        }
        return $atributos;
    }


    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value); //Estamos creando un nuevo array con las posiciones de las columnas para no perder la referencia de los datos de titulo, precio,... y tenemos que limpiar el value que son los datos que ha introducido un usuario y tenemos que evitar meter en la bbdd inyeccion sql
        }

        return $sanitizado;
    }

    //Subida de archivos de imagenes
    public function setImagen($imagen)
    {
        // Elimina la imagen anterior si la actualizamos
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    //Eliminar el archivo de la imagen en el disco duro
    public function borrarImagen()
    {
        //Comprobamos si el archivo existe para no tener errores en el servidor
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen); //Esto elimina la imagen antigua
        }
    }
}