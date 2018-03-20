<?php

namespace Controllers\Administradores;

use Controllers\AGenericCtrl;
use Controllers\ICrudeable;
use Models\Administrador;
use Models\DAO\Exceptions\NotFoundException;

/**
 * Description of AdministradoresCtrl
 *
 * @author rpereyra <bemonee@gmail.com>
 */
class AdministradoresCtrl extends AGenericCtrl implements ICrudeable
{
    public function add()
    {
        $this->gump->validation_rules(array(
            'user' => 'required|alpha_numeric|max_len,20|min_len,6',
            'pass' => 'required|max_len,100|min_len,6',
            'nombre' => 'valid_name|max_len,200'
        ));

        $this->gump->filter_rules(array(
            'user' => 'trim|sanitize_string',
            'pass' => 'trim',
            'nombre' => 'trim|sanitize_string'
        ));

        $params = $this->gump->run($_POST);

        if ($params !== false) {
            if ($this->getLoggedUser()->addAdministrador($params)) {
                $this->redirect('/admins/');
            } else {
                $this->smarty->assign('alerta', 'El administrador ya existe');
            }
        } else {
            $this->smarty->assign('alerta', 'Los datos ingresados estan mal formados');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
        }
        $this->showAdd();
    }

    public function delete($get = array())
    {
        $reglas = [
            'id' => 'required|integer'
        ];

        $filtros = [
            'id' => 'sanitize_numbers'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($get);
        if ($params !== false) {
            try {
                $a = new Administrador($params['id']);
                $this->getLoggedUser()->deleteAdministrador($a);
                $this->redirect('/admins/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el administrador');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un administrador valido']);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro el administrador');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }

    public function show()
    {
        $lista = $this->getLoggedUser()->findOthers();
        if (!empty($lista)) {
            $this->smarty->assign('administradores', $lista);
        }
        $this->smarty->display("Views/Administradores/administradores.tpl");
    }

    public function showAdd()
    {
        $this->smarty->display("Views/Administradores/alta.administradores.tpl");
    }

    public function showUpdate($get = array())
    {
        $reglas = [
            'id' => 'required|integer'
        ];

        $filtros = [
            'id' => 'sanitize_numbers'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($get);
        if ($params !== false) {
            try {
                $admin = new Administrador($params['id']);
                $this->smarty->assign('nombre', $admin->getNombreApellido());
                $this->smarty->assign('user', $admin->getUsuario());
                $this->smarty->assign('id', $admin->getIdADM());
                $this->smarty->display("Views/Administradores/modificacion.administradores.tpl");
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el administrador');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un administrador valido']);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function update($get = array())
    {
        $get = array_merge($get, $_POST);
        $this->gump->validation_rules(array(
            'pass' => 'max_len,100|min_len,6',
            'nombre' => 'valid_name|max_len,200',
            'id' => 'required|integer'
        ));

        $this->gump->filter_rules(array(
            'pass' => 'trim',
            'nombre' => 'trim|sanitize_string',
            'id' => 'sanitize_numbers'
        ));

        $params = $this->gump->run($get);

        if ($params !== false) {
            $admin = new Administrador($params['id']);
            if ($this->getLoggedUser()->updateAdministrador($admin, $params)) {
                $this->redirect('/admins/');
            } else {
                $this->smarty->assign('alerta', 'Error');
                $this->smarty->assign('alerta_errores', $ex->getMessage());
                $this->showUpdate($get);
            }
        } else {
            $this->smarty->assign('alerta', 'Los datos ingresados estan mal formados');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->showUpdate($get);
        }
    }
}
