<?php

namespace Models\DAO;

/**
 * Capa de acceso a datos para los usuarios
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AUsuarioDAO extends AGenericDAO
{

    /**
     * Protected variable
     * @var varchar $nombre_apellido
     */
    protected $nombre_apellido;

    /**
     * Protected variable
     * @var varchar $usuario
     */
    protected $usuario;

    /**
     * Protected variable
     * @var varchar $pass
     */
    protected $password;

    public function __construct($tabla, $primKeys, $fields, $id = 0)
    {
        $user_fields = array_merge($fields, ['nombre_apellido', 'usuario', 'password']);
        parent::__construct($tabla, $primKeys, $user_fields, $id);
    }

    public function getNombreApellido()
    {
        return $this->nombre_apellido;
    }

    public function setNombreApellido($nombre_apellido)
    {
        $this->nombre_apellido = $nombre_apellido;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     * @param string $usuario
     * @return self
     */
    public function findByUsuario($usuario)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE usuario='$usuario' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
