<?php

namespace Models\DAO\Exceptions;

use Exception;

/**
 * Excepcion arrojada al no poder obtener la consulta de la db
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class ReadException extends Exception
{
    public function errorMessage()
    {
        return $this->getMessage() . $this->getCode() . "\n" . $this->getTraceAsString();
    }
}
