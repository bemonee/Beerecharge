<?php

namespace Controllers\Auth;

use Controllers\IAddeable;
use Models\Cliente;

/**
 * Logueo y registro de clientes
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class ClientAuthCtrl extends AAuthCtrl implements IAddeable
{
    public function __construct()
    {
        parent::__construct('Cliente');
    }

    public function add()
    {
        $this->gump->validation_rules(array(
            'user' => 'required|alpha_numeric|max_len,20|min_len,6',
            'pass' => 'required|max_len,100|min_len,6',
            'pass2' => 'required|max_len,100|min_len,6'
        ));

        $this->gump->filter_rules(array(
            'user' => 'trim|sanitize_string',
            'pass' => 'trim',
            'pass2' => 'trim'
        ));

        $params = $this->gump->run($_POST);

        if ($params !== false) {
            $user = $params['user'];
            $pass = $params['pass'];
            $pass2 = $params['pass2'];

            // Verifico que las contraseñas coincidan
            if ($pass !== $pass2) {
                $this->smarty->assign('alerta', 'Las contraseñas no coinciden');
                $this->show();
                exit();
            }

            $c = new Cliente();
            if ($c->register($user, $pass)) {
                // Redirijo a LOGIN, si hay datos de session salta a HOME
                $this->redirect();
            } else {
                $this->smarty->assign('alerta', 'El usuario ya existe');
            }
        } else {
            $this->smarty->assign('alerta', 'Los datos ingresados estan mal formados');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
        }

        $this->show();
    }

    public function getAllowedProfiles()
    {
        return ['Cliente'];
    }
}
