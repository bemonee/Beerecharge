<?php

namespace Controllers\Auth;

/**
 * Contrato para entidades que pueden acceder al sistema
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
interface IAuthenticatable
{
    public function login();

    public function logout();
}
