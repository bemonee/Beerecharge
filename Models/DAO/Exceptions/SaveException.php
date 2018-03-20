<?php

namespace Models\DAO\Exceptions;

use Exception;

/**
 * Excepcion arrojada al no poder insertar o actualizar un registro
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class SaveException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage() . $this->getCode() . "\n" . $this->getTraceAsString();
    }
}
