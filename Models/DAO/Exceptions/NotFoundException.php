<?php

namespace Models\DAO\Exceptions;

use Exception;

/**
 * Excepcion arrojada al no encontrar un registro
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class NotFoundException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
