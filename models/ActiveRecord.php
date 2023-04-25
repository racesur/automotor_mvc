<?php

namespace Model;

class ActiveRecord
{
    //Base de Datos
    protected static $db;
    protected static $columnasDB = []; //Con esto mapearemos los datos para que se emparejen con las columnas de la bbdd
    protected static $tabla = '';

    //Errores
    protected static $errores = [];

    // Definimos la conexión a  la BBDD
    public static function setDB($database)
    {
        self::$db = $database; // La conexión la establece la clase padre para no realizar una conexión por cada clase, así evitamos consumir memoria
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
        $query = "SELECT * FROM " . static::$tabla; //static::$tabla buscará el valor del atributo en la clase hija donde se esté ejecutando. Por eso los modelos deben heredar de esta clase

        // $resultado = self::$db->query($query); //funciona pero no nos vale porque necesitamos que nos devuelva objetos
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene un determinado número de registros (página ppal)
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        // $resultado = self::$db->query($query); //funciona pero no nos vale porque necesitamos objetos
        $resultado = self::consultarSQL($query);

        return $resultado;
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
        $resultado->free(); //la función free es para liberar la memoria

        //Devolver los resultados
        return $array;
    }

    //Creamos los objetos a partir de los resultados obtenidos de la BBDD
    protected static function crearObjeto($registro)
    {
        $objeto = new static(); // Crea nuevos objetos a partir de la info que obtenemos de la BBDD, con todos los campos (atributos) que tenga cada modelo ejemlpo coche-> id, titutlo, etc..

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) { //Compara 2 objetos, uno es el nuevo objeto creado y otro es el key, y vamos a verificar si este nuevo objeto tiene un key llamado 'id', 'titulo', etc.. entonces le asignará el valor que tenemos en value -- Estamos Mapeando los datos --
                $objeto->$key = $value;
            }
        }

        return $objeto; // Devolvemos los datos de la BBDD en forma de objetos
    }
}
