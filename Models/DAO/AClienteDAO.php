<?php

namespace Models\DAO;

use Models\Cliente;
use Models\Pedido;

/**
 * Capa de acceso a datos para clientes
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AClienteDAO extends AUsuarioDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idCLIENTE
     */
    protected $idCLIENTE;

    /**
     * Protected variable
     * @var varchar $domicilio
     */
    protected $domicilio;

    /**
     * Protected variable
     * @var varchar $telefono
     */
    protected $telefono;

    /**
     * Protected variable
     * @var varchar $email
     */
    protected $email;

    /**
     * Protected variable
     * @var bigint $fb_id
     */
    protected $fb_id;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'clientes';
        $primkeys = ['idCLIENTE'];
        $fields = ['domicilio', 'telefono', 'email', 'fb_id'];
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

    public function getDomicilio()
    {
        return $this->domicilio;
    }

    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFbId()
    {
        return $this->fb_id;
    }

    public function setFbId($fb_id)
    {
        $this->fb_id = $fb_id;
    }

    /**
     * Pedidos - tabla referida
     * @return Pedido[]
     */
    public function getPedidos()
    {
        $sql = "SELECT * FROM pedidos WHERE idCLIENTE='{$this->idCLIENTE}'";
        return $this->getObjects($sql, 'Models\Pedido');
    }

    /**
     * Primary Key Finder
     * @return Cliente
     */
    public function findByIdCLIENTE($idCLIENTE)
    {
        $sql = "SELECT * FROM clientes WHERE idCLIENTE='$idCLIENTE' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
