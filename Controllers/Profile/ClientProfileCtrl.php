<?php

namespace Controllers\Profile;

use Controllers\AGenericCtrl;
use Controllers\IUpdatable;

/**
 * Description of ClientProfile
 *
 * @author rpereyra <bemonee@gmail.com>
 */
class ClientProfileCtrl extends AGenericCtrl implements IUpdatable
{
    public function show()
    {
        $cliente = $this->getLoggedUser();
        $this->smarty->assign('user', $cliente->getUsuario());
        $this->smarty->assign('email', $cliente->getEmail());
        $this->smarty->assign('nombre', $cliente->getNombreApellido());
        $this->smarty->assign('direccion', $cliente->getDomicilio());
        $this->smarty->assign('telefono', $cliente->getTelefono());
        $this->smarty->display('Views/Profile/client.tpl');
    }

    public function update($get = array())
    {
        $reglas = [
            'email' => 'valid_email',
            'nombre' => 'valid_name|max_len,200',
            'direccion' => 'street_address|max_len,200',
            'telefono' => 'phone_number|max_len,200'
        ];

        $filtros = [
            'email' => 'trim|sanitize_email',
            'nombre' => 'trim|sanitize_string',
            'direccion' => 'trim|sanitize_string',
            'telefono' => 'trim|sanitize_string'
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
            $cliente = $this->getLoggedUser();
            $cliente->changeProfile($params);

            if (!empty($params['pass'])) {
                $pass = $params['pass'];
                $pass_nueva = $params['pass_nueva'];
                if (!$cliente->changePassword($pass, $pass_nueva)) {
                    $this->smarty->assign('alerta', 'No se pudo cambiar la contraseña');
                    $this->smarty->assign('alerta_errores', 'La contraseña no coincide con la actual');
                    $this->show();
                    exit();
                }
            }
            $this->redirect('/clients/config/');
        } else {
            $this->gump->set_field_names([
                'nombre' => 'Nombre y Apellido',
                'direccion' => 'Domicilio'
            ]);
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function getAllowedProfiles()
    {
        return ['Cliente'];
    }
}
