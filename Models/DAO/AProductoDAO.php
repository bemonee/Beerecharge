<?php

namespace Models\DAO;

use Models\Producto;
use Models\Recarga;

/**
 * Capa de acceso a datos para productos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AProductoDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idPROD
     */
    protected $idPROD;

    /**
     * Protected variable
     * @var varchar $descripcion
     */
    protected $descripcion;

    /**
     * Protected variable
     * @var varchar $ruta_imagen
     */
    protected $ruta_imagen;

    /**
     * Protected variable
     * @var float $capacitad_lts
     */
    protected $capacitad_lts;

    /**
     * Protected variable
     * @var float $factor_precio
     */
    protected $factor_precio;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'productos';
        $primkeys = ['idPROD'];
        $fields = ['descripcion', 'ruta_imagen', 'capacitad_lts', 'factor_precio'];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdPROD()
    {
        return $this->idPROD;
    }

    public function setIdPROD($idPROD)
    {
        $this->idPROD = $idPROD;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getRutaImagen()
    {
        return $this->ruta_imagen;
    }

    public function setRutaImagen($ruta_imagen)
    {
        $this->ruta_imagen = $ruta_imagen;
    }

    public function getCapacitadLts()
    {
        return $this->capacitad_lts;
    }

    public function setCapacitadLts($capacitad_lts)
    {
        $this->capacitad_lts = $capacitad_lts;
    }

    public function getFactorPrecio()
    {
        return $this->factor_precio;
    }

    public function setFactorPrecio($factor_precio)
    {
        $this->factor_precio = $factor_precio;
    }

    /**
     * Recargas - tabla referida
     * @return Recarga[]
     */
    public function getRecargas()
    {
        $sql = "SELECT * FROM recargas WHERE idPROD='{$this->idPROD}'";
        return $this->getObjects($sql, 'Models\Recarga');
    }

    /**
     * Primary Key Finder
     * @return Producto
     */
    public function findByIdPROD($idPROD)
    {
        $sql = "SELECT * FROM productos WHERE idPROD='$idPROD' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
