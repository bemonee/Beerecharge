<?php

namespace Models\DAO;

use Models\Pedido;
use Models\Sucursal;

/**
 * Capa de acceso a datos para sucursales
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class ASucursalDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idSUC
     */
    protected $idSUC;

    /**
     * Protected variable
     * @var varchar $descripcion
     */
    protected $descripcion;

    /**
     * Protected variable
     * @var varchar $direccion
     */
    protected $direccion;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'sucursales';
        $primkeys = ['idSUC'];
        $fields = ['descripcion', 'direccion'];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdSUC()
    {
        return $this->idSUC;
    }

    public function setIdSUC($idSUC)
    {
        $this->idSUC = $idSUC;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Pedidos - tabla referida
     * @return Pedido[]
     */
    public function getPedidos()
    {
        $sql = "SELECT * FROM pedidos WHERE idSUC='{$this->idSUC}'";
        return $this->getObjects($sql, 'Models\Pedido');
    }

    /**
     * Primary Key Finder
     * @return Sucursal
     */
    public function findByIdSUC($idSUC)
    {
        $sql = "SELECT * FROM sucursales WHERE idSUC='$idSUC' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
