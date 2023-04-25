<?php

namespace Model;

class Coche extends ActiveRecord
{
    protected static $tabla = 'coches';
    protected static $columnasDB = ['id', 'titulo', 'marca', 'modelo', 'precio', 'imagen', 'puertas', 'plazas', 'potencia', 'descripcion', 'vendedorId', 'creado']; //Con esto mapeamos los datos para que se emparejen con las columnas de la bbdd


    public $id;
    public $titulo;
    public $marca;
    public $modelo;
    public $precio;
    public $imagen;
    public $puertas;
    public $plazas;
    public $potencia;
    public $descripcion;
    public $vendedorId;
    public $creado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null; //En el caso de que no esté presente este valor, le pondremos por defecto un valor null
        $this->titulo = $args['titulo'] ?? '';
        $this->marca = $args['marca'] ?? '';
        $this->modelo = $args['modelo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->puertas = $args['puertas'] ?? '';
        $this->plazas = $args['plazas'] ?? '';
        $this->potencia = $args['potencia'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
        $this->creado = date('Y/m/d') ?? '';
    }
}
