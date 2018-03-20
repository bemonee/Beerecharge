<?php

namespace Controllers\Auth;

use Controllers\AGenericCtrl;
use Controllers\Auth\IAuthenticatable;
use Exception;
use Models\Administrador;

/**
 * Autenticacion de usuarios
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AAuthCtrl extends AGenericCtrl implements IAuthenticatable
{
    private $model_class_name = null;

    public function __construct($model_class_name = null)
    {
        parent::__construct();

        $model_with_namespace = $this->models_base_dir . $model_class_name;
        if (empty($model_class_name) || !class_exists($model_with_namespace)) {
            throw new Exception('El nombre del modelo es obligatorio');
        } else {
            $this->model_class_name = $model_with_namespace;
        }
    }

    public function show()
    {
        $this->smarty->display('Auth/login.tpl');
    }

    public function login()
    {
        $this->gump->validation_rules(array(
            'user' => 'required|alpha_numeric|max_len,20|min_len,6',
            'pass' => 'required|max_len,100|min_len,6'
        ));

        $this->gump->filter_rules(array(
            'user' => 'trim|sanitize_string',
            'pass' => 'trim'
        ));

        $params = $this->gump->run($_POST);

        if ($params !== false) {
            $user = $params['user'];
            $pass = $params['pass'];

            /* @var $admin Administrador */
            $a = new $this->model_class_name();
            $admin = $a->findByUsuario($user);
            if ($admin !== null && $admin->canLogin($pass, $admin->getPassword())) {
                session_regenerate_id(); // Regenero la id de session para evitar malintenciones
                $_SESSION['usuario'] = $admin;
                // Redirijo a LOGIN, si hay datos de session salta a HOME
                $this->redirect();
            } else {
                $this->smarty->assign('alerta', 'Los datos no coinciden con un usuario registrado');
                $this->smarty->assign('tipo', $this->model_class_name);
            }
        } else {
            $this->smarty->assign('alerta', 'Los datos ingresados estan mal formados');
            $this->smarty->assign('tipo', $this->model_class_name);
        }

        $this->show();
    }

    public function logout()
    {
        session_destroy();
        session_regenerate_id(); // Regenero la id de session para evitar malintenciones
        $this->redirect();
    }
}
