<?php

namespace Models;

use Models\DAO\ARecargaDAO;

/**
 * Capa de negocio de recargas
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Recarga extends ARecargaDAO
{

    /**
     * Devuelve el valor total de una recarga
     * @return float
     */
    public function getValor()
    {
        $precio = $this->getTipoCerveza()->getPrecioXLitro();
        $producto = $this->getProducto();
        $factor = $producto->getFactorPrecio();
        $cant_litros = $producto->getCapacitadLts();
        $cant = $this->getCantidad();
        return (($precio * $factor * $cant_litros) * $cant);
    }

    /**
     * Devuelve los litros de cerveza recargados
     * @return float
     */
    public function getLitros()
    {
        $capacidad = $this->getProducto()->getCapacitadLts();
        $cant = $this->getCantidad();
        return ($capacidad * $cant);
    }
}
