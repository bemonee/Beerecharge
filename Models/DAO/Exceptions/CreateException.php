<?php

namespace Models\DAO\Exceptions;

use Exception;

/**
 * Excepcion arrojada al crear un registro
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class CreateException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage() . $this->getCode() . "\n" . $this->getTraceAsString();
    }
}
