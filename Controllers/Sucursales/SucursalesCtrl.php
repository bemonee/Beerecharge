<?php

namespace Controllers\Sucursales;

use Controllers\AGenericCtrl;
use Controllers\ICrudeable;
use Models\DAO\Exceptions\DeleteException;
use Models\DAO\Exceptions\NotFoundException;
use Models\Sucursal;

/**
 * Description of SucursalesCtrl
 *
 * @author usuario
 */
class SucursalesCtrl extends AGenericCtrl implements ICrudeable
{
    public function add()
    {
        $reglas = [
            'descripcion' => 'required|alpha_space|max_len,200',
            'direccion' => 'required|street_address|max_len,200'
        ];

        $filtros = [
            'descripcion' => 'trim|sanitize_string',
            'direccion' => 'trim|sanitize_string'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($_POST);
        if ($params !== false) {
            $this->getLoggedUser()->createSucursal($params);
            $this->redirect("/sucursales/");
        } else {
            $this->gump->set_field_names([
                'descripcion' => 'Descripción',
                'direccion' => 'Dirección'
            ]);
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->showAdd();
        }
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
                $sucursal = new Sucursal($params['id']);
                $this->getLoggedUser()->deleteSucursal($sucursal);
                $this->redirect('/sucursales/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro la sucursal');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a una sucursal valida']);
                $this->show();
            } catch (DeleteException $ex) {
                $this->smarty->assign('alerta', 'No se pudo eliminar la sucursal');
                $this->smarty->assign('alerta_errores', [$ex->getMessage()]);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro la sucursal');
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
        $sucursal = new Sucursal();
        $lista_sucursales = $sucursal->getList($sucursal->getTotalNo());
        if (!empty($lista_sucursales)) {
            $this->smarty->assign('sucursales', $lista_sucursales);
        }
        $this->smarty->display("Views/Sucursales/sucursales.tpl");
    }

    public function showAdd()
    {
        $this->smarty->display("Views/Sucursales/alta.sucursales.tpl");
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
                $sucursal = new Sucursal($params['id']);
                $this->smarty->assign('descripcion', $sucursal->getDescripcion());
                $this->smarty->assign('direccion', $sucursal->getDireccion());
                $this->smarty->assign('id', $sucursal->getId());
                $this->smarty->display("Views/Sucursales/modificacion.sucursales.tpl");
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro la sucursal');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a una sucursal valida']);
                $this->show();
            }
        } else {
            $this->gump->set_field_names([
                'descripcion' => 'Descripción',
                'direccion' => 'Dirección'
            ]);
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function update($get = array())
    {
        $reglas = [
            'id' => 'required|integer',
            'descripcion' => 'required|alpha_space|max_len,200',
            'direccion' => 'required|street_address|max_len,200'
        ];

        $filtros = [
            'id' => 'sanitize_numbers',
            'descripcion' => 'trim|sanitize_string',
            'direccion' => 'trim|sanitize_string'
        ];

        $get_post = array_merge($get, $_POST);

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($get_post);
        if ($params !== false) {
            try {
                $this->getLoggedUser()->updateSucursal($params);
                $this->redirect('/sucursales/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro la sucursal');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a una sucursal valida']);
                $this->showUpdate($get);
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro la sucursal');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->showUpdate($get);
        }
    }
}
