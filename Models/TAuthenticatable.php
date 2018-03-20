<?php

namespace Models;

/**
 *
 * @author rpereyra <bemonee@gmail.com>
 */
trait TAuthenticatable
{

    /**
     * Verifica si un cliente puede loguearse en el sistema
     * @param string $pass
     * @param string $user_hash
     * @return boolean
     */
    public function canLogin($pass, $user_hash)
    {
        return password_verify($pass, $user_hash);
    }
    
    /**
     * Genera una nueva contraseña
     * @param string $pass
     * @return type
     */
    public function generatePassword($pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }
}
