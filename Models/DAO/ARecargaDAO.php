<?php

namespace Models\DAO;

use Models\Pedido;
use Models\Producto;
use Models\Recarga;
use Models\TipoCerveza;

/**
 * Capa de acceso a datos para recargas
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class ARecargaDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * (FK)->productos.idPROD
     * @var int $idPROD
     */
    protected $idPROD;

    /**
     * Protected variable
     * (PK)->Primary key
     * (FK)->tipo_cervezas.idTC
     * @var int $idTC
     */
    protected $idTC;

    /**
     * Protected variable
     * (PK)->Primary key
     * (FK)->pedidos.idPED
     * @var int $idPED
     */
    protected $idPED;

    /**
     * Protected variable
     * @var int $cantidad
     */
    protected $cantidad;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'recargas';
        $primkeys = ['idPROD', 'idTC', 'idPED'];
        $fields = ['cantidad'];
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

    public function getIdTC()
    {
        return $this->idTC;
    }

    public function setIdTC($idTC)
    {
        $this->idTC = $idTC;
    }

    public function getIdPED()
    {
        return $this->idPED;
    }

    public function setIdPED($idPED)
    {
        $this->idPED = $idPED;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Producto - tabla referenciada
     * @return Producto
     */
    public function getProducto()
    {
        $sql = "SELECT * FROM productos WHERE idPROD='{$this->idPROD}' LIMIT 1";
        return $this->getObject($sql, 'Models\Producto');
    }

    /**
     * TipoCerveza - tabla referenciada
     * @return TipoCerveza
     */
    public function getTipoCerveza()
    {
        $sql = "SELECT * FROM tipo_cervezas WHERE idTC='{$this->idTC}' LIMIT 1";
        return $this->getObject($sql, 'Models\TipoCerveza');
    }

    /**
     * Pedido - tabla referenciada
     * @return Pedido
     */
    public function getPedido()
    {
        $sql = "SELECT * FROM pedidos WHERE idPED='{$this->idPED}' LIMIT 1";
        return $this->getObject($sql, 'Models\Pedido');
    }

    /**
     * Column idPROD Finder
     * @return Recarga[]
     */
    public function findByIdPROD($idPROD)
    {
        $sql = "SELECT * FROM recargas WHERE idPROD='$idPROD'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Column idTC Finder
     * @return Recarga[]
     */
    public function findByIdTC($idTC)
    {
        $sql = "SELECT * FROM recargas WHERE idTC='$idTC'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Column idPED Finder
     * @return Recarga[]
     */
    public function findByIdPED($idPED)
    {
        $sql = "SELECT * FROM recargas WHERE idPED='$idPED'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Composite Primary Key Finder
     * @return Recarga
     */
    public function findByIdPRODAndIdTCAndIdPED($idPROD, $idTC, $idPED)
    {
        $sql = "SELECT * FROM recargas WHERE idPROD='$idPROD' AND idTC='$idTC' AND idPED='$idPED' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
