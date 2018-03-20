<?php

namespace Models;

use Models\DAO\AProductoDAO;
use Models\DAO\Exceptions\DeleteException;

/**
 * Capa de negocio de productos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Producto extends AProductoDAO
{
    public function delete($ids = 0)
    {
        if (!count($this->getRecargas())) {
            unlink($this->getRutaImagen());
            parent::delete($ids);
        } else {
            throw new DeleteException("El producto tiene recargas asociadas");
        }
    }
}
