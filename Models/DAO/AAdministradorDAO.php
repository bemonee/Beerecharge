<?php

namespace Models\DAO;

use Models\Administrador;

/**
 * Capa de acceso a datos para administradores
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AAdministradorDAO extends AUsuarioDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idADM
     */
    protected $idADM;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'administradores';
        $primkeys = ['idADM'];
        $fields = [];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdADM()
    {
        return $this->idADM;
    }

    public function setIdADM($idADM)
    {
        $this->idADM = $idADM;
    }

    /**
     * Primary Key Finder
     * @return Administrador
     */
    public function findByIdADM($idADM)
    {
        $sql = "SELECT * FROM administradores WHERE idADM='$idADM' LIMIT 1";
        return $this->getSelfObject($sql);
    }
    
    public function findOthers()
    {
        $sql = "SELECT * FROM administradores WHERE idADM <> {$this->getIdADM()}";
        return $this->getSelfObjects($sql);
    }
}
