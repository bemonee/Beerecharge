<?php

namespace Models;

use Models\DAO\ASucursalDAO;
use Models\DAO\Exceptions\DeleteException;

/**
 * Capa de negocio de sucursales
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Sucursal extends ASucursalDAO
{
    public function delete($ids = 0)
    {
        if (!count($this->getPedidos())) {
            parent::delete($ids);
        } else {
            throw new DeleteException("La sucursal tiene pedidos asociados");
        }
    }
}
