<?php

namespace Models\DAO;

use Models\Envio;
use Models\Pedido;

/**
 * Capa de acceso a datos para envios
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AEnvioDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idENV
     */
    protected $idENV;

    /**
     * Protected variable
     * @var int $direccion
     */
    protected $direccion;

    /**
     * Protected variable
     * @var date $fecha_entrega
     */
    protected $fecha_entrega;

    /**
     * Protected variable
     * @var time $rango_hora_min
     */
    protected $rango_hora_min;

    /**
     * Protected variable
     * @var time $rango_hora_max
     */
    protected $rango_hora_max;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'envios';
        $primkeys = ['idENV'];
        $fields = ['direccion', 'fecha_entrega', 'rango_hora_min', 'rango_hora_max'];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdENV()
    {
        return $this->idENV;
    }

    public function setIdENV($idENV)
    {
        $this->idENV = $idENV;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    public function setFechaEntrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
    }

    public function getRangoHoraMin()
    {
        return $this->rango_hora_min;
    }

    public function setRangoHoraMin($rango_hora_min)
    {
        $this->rango_hora_min = $rango_hora_min;
    }

    public function getRangoHoraMax()
    {
        return $this->rango_hora_max;
    }

    public function setRangoHoraMax($rango_hora_max)
    {
        $this->rango_hora_max = $rango_hora_max;
    }

    /**
     * Pedidos - tabla referida
     * @return Pedido[]
     */
    public function getPedidos()
    {
        $sql = "SELECT * FROM pedidos WHERE idENV='{$this->idENV}'";
        return $this->getObjects($sql, 'Models\Pedido');
    }

    /**
     * Primary Key Finder
     * @return Envio
     */
    public function findByIdENV($idENV)
    {
        $sql = "SELECT * FROM envios WHERE idENV='$idENV' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
