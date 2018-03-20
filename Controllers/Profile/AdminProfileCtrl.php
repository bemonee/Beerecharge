<?php

namespace Controllers\Profile;

use Controllers\AGenericCtrl;
use Controllers\IUpdatable;

/**
 * Description of AdminProfileCtrl
 *
 * @author usuario
 */
class AdminProfileCtrl extends AGenericCtrl implements IUpdatable
{
    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }

    public function show()
    {
        $admin = $this->getLoggedUser();
        $this->smarty->assign('user', $admin->getUsuario());
        $this->smarty->assign('nombre', $admin->getNombreApellido());
        $this->smarty->display('Views/Profile/admin.tpl');
    }

    public function update($get = array())
    {
        $reglas = [
            'nombre' => 'valid_name|max_len,200'
        ];

        $filtros = [
            'nombre' => 'trim|sanitize_string'
        ];

        if (!empty($_POST['pass'])) {
            $reglas = array_merge($reglas, [
                'pass' => 'required|max_len,100|min_len,6',
                'pass_nueva' => 'required|max_len,100|min_len,6'
            ]);

            $filtros = array_merge($filtros, [
                'pass' => 'trim',
                'pass_nueva' => 'trim'
            ]);
        }

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);

        $params = $this->gump->run($_POST);
        if ($params !== false) {
            $admin = $this->getLoggedUser();
            $admin->changeProfile($params);

            if (!empty($params['pass'])) {
                $pass = $params['pass'];
                $pass_nueva = $params['pass_nueva'];
                if (!$admin->changePassword($pass, $pass_nueva)) {
                    $this->smarty->assign('alerta', 'No se pudo cambiar la contraseña');
                    $this->smarty->assign('alerta_errores', 'La contraseña no coincide con la actual');
                    $this->show();
                    exit();
                }
            }
            $this->redirect('/admins/config/');
        } else {
            $this->gump->set_field_names([
                'nombre' => 'Nombre y Apellido'
            ]);
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }
}
