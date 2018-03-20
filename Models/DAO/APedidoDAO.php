<?php

namespace Models\DAO;

use Models\Cliente;
use Models\Envio;
use Models\Pedido;
use Models\Recarga;
use Models\Sucursal;

/**
 * Capa de acceso a datos para pedidos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class APedidoDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (FK)->clientes.idCLIENTE
     * @var int $idCLIENTE
     */
    protected $idCLIENTE;

    /**
     * Protected variable
     * (FK)->sucursales.idSUC
     * @var int $idSUC
     */
    protected $idSUC;

    /**
     * Protected variable
     * (FK)->envios.idENV
     * @var int $idENV
     */
    protected $idENV;

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idPED
     */
    protected $idPED;

    /**
     * Protected variable
     * @var tinyint $estado
     */
    protected $estado;

    /**
     * Protected variable
     * @var timestamp $fecha_entrega
     */
    protected $fecha_entrega;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'pedidos';
        $primkeys = ['idPED'];
        $fields = ['idCLIENTE', 'idSUC', 'idENV', 'estado', 'fecha_entrega'];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdCLIENTE()
    {
        return $this->idCLIENTE;
    }

    public function setIdCLIENTE($idCLIENTE)
    {
        $this->idCLIENTE = $idCLIENTE;
    }

    public function getIdSUC()
    {
        return $this->idSUC;
    }

    public function setIdSUC($idSUC)
    {
        $this->idSUC = $idSUC;
    }

    public function getIdENV()
    {
        return $this->idENV;
    }

    public function setIdENV($idENV)
    {
        $this->idENV = $idENV;
    }

    public function getIdPED()
    {
        return $this->idPED;
    }

    public function setIdPED($idPED)
    {
        $this->idPED = $idPED;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    public function setFechaEntrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
    }

    /**
     * Cliente - tabla referenciada
     * @return Cliente
     */
    public function getCliente()
    {
        $sql = "SELECT * FROM clientes WHERE idCLIENTE='{$this->idCLIENTE}' LIMIT 1";
        return $this->getObject($sql, 'Models\Cliente');
    }

    /**
     * Sucursal - tabla referenciada
     * @return Sucursal
     */
    public function getSucursal()
    {
        $sql = "SELECT * FROM sucursales WHERE idSUC='{$this->idSUC}' LIMIT 1";
        return $this->getObject($sql, 'Models\Sucursal');
    }

    /**
     * Envio - tabla referenciada
     * @return Envio
     */
    public function getEnvio()
    {
        $sql = "SELECT * FROM envios WHERE idENV='{$this->idENV}' LIMIT 1";
        return $this->getObject($sql, 'Models\Envio');
    }

    /**
     * Recargas - tabla referida
     * @return Recarga[]
     */
    public function getRecargas()
    {
        $sql = "SELECT * FROM recargas WHERE idPED='{$this->idPED}'";
        return $this->getObjects($sql, 'Models\Recarga');
    }

    /**
     * Column idCLIENTE Finder
     * @return Pedido[]
     */
    public function findByIdCLIENTE($idCLIENTE)
    {
        $sql = "SELECT * FROM pedidos WHERE idCLIENTE='$idCLIENTE'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Column idSUC Finder
     * @return Pedido[]
     */
    public function findByIdSUC($idSUC)
    {
        $sql = "SELECT * FROM pedidos WHERE idSUC='$idSUC'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Column idENV Finder
     * @return Pedido[]
     */
    public function findByIdENV($idENV)
    {
        $sql = "SELECT * FROM pedidos WHERE idENV='$idENV'";
        return $this->getSelfObjects($sql);
    }

    /**
     * Primary Key Finder
     * @return Pedido
     */
    public function findByIdPED($idPED)
    {
        $sql = "SELECT * FROM pedidos WHERE idPED='$idPED' LIMIT 1";
        return $this->getSelfObject($sql);
    }
    
    public function findByFechaClienteSucursal($fecha, $idCLIENTE, $idSUC)
    {
        $where = '';
        if (!empty($fecha)) {
            $where .= "AND DATE_FORMAT(creado_en, '%Y-%m-%d') = '$fecha' ";
        }
        
        if (!empty($idCLIENTE)) {
            $where .= "AND idCLIENTE = '$idCLIENTE' ";
        }
        
        if (!empty($idSUC)) {
            $where .= "AND idSUC = '$idSUC' ";
        }
        
        $sql = "SELECT * FROM pedidos WHERE 1=1 $where";
        return $this->getSelfObjects($sql);
    }
}
