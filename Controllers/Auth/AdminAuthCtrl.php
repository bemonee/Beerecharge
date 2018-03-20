<?php

namespace Controllers\Auth;

/**
 * Logueo y alta de administradores
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class AdminAuthCtrl extends AAuthCtrl
{
    public function __construct()
    {
        parent::__construct('Administrador');
    }

    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }
}
