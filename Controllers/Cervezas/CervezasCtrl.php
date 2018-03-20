<?php

namespace Controllers\Cervezas;

use Controllers\AGenericCtrl;
use Controllers\ICrudeable;
use Exception;
use Models\Administrador;
use Models\DAO\Exceptions\DeleteException;
use Models\DAO\Exceptions\NotFoundException;
use Models\TipoCerveza;

/**
 * Description of CervezasCtrl
 *
 * @author usuario
 */
class CervezasCtrl extends AGenericCtrl implements ICrudeable
{
    public function add()
    {
        $input = array_merge($_POST, $_FILES);
        $reglas = [
            'descripcion' => 'required|alpha_space|max_len,100',
            'abv' => 'required|float|min_numeric,0|max_numeric,99.99',
            'ibu' => 'required|integer|min_numeric,0|max_numeric,100',
            'srm' => 'required|integer|min_numeric,0|max_numeric,100',
            'precio_x_litro' => 'required|float|min_numeric,0|max_numeric,9999.99',
            'foto' => 'required_file|extension,png;jpg'
        ];

        $filtros = [
            'descripcion' => 'trim|sanitize_string',
            'abv' => 'trim|sanitize_floats',
            'ibu' => 'trim|sanitize_numbers',
            'srm' => 'trim|sanitize_numbers',
            'precio_x_litro' => 'trim|sanitize_floats'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($input);
        if ($params !== false) {
            try {
                /* @var $admin Administrador */
                $admin = $this->getLoggedUser();
                if ($admin->createCerveza($params)) {
                    $this->redirect('/cervezas/');
                }
            } catch (Exception $ex) {
                $this->smarty->assign('alerta', 'Error');
                $this->smarty->assign('alerta_errores', $ex->getMessage());
                $this->showAdd();
                exit();
            }
        } else {
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
                $tc = new TipoCerveza($params['id']);
                $this->getLoggedUser()->deleteCerveza($tc);
                $this->redirect('/cervezas/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro la cerveza');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a una cerveza valida']);
                $this->show();
            } catch (DeleteException $ex) {
                $this->smarty->assign('alerta', 'No se pudo eliminar la cerveza');
                $this->smarty->assign('alerta_errores', [$ex->getMessage()]);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro la cerveza');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function update($get = array())
    {
        $input = array_merge($_POST, $_FILES, $get);
        $reglas = [
            'descripcion' => 'required|alpha_space|max_len,100',
            'abv' => 'required|float|min_numeric,0|max_numeric,99.99',
            'ibu' => 'required|integer|min_numeric,0|max_numeric,100',
            'srm' => 'required|integer|min_numeric,0|max_numeric,100',
            'precio_x_litro' => 'required|float|min_numeric,0|max_numeric,9999.99',
            'foto' => 'extension,png;jpg',
            'id' => 'required|integer'
        ];

        $filtros = [
            'descripcion' => 'trim|sanitize_string',
            'abv' => 'trim|sanitize_floats',
            'ibu' => 'trim|sanitize_numbers',
            'srm' => 'trim|sanitize_numbers',
            'precio_x_litro' => 'trim|sanitize_floats',
            'id' => 'sanitize_numbers'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($input);
        if ($params !== false) {
            try {
                /* @var $admin Administrador */
                $tc = new TipoCerveza($params['id']);
                $admin = $this->getLoggedUser();
                if ($admin->updateCerveza($tc, $params)) {
                    $this->redirect('/cervezas/');
                }
            } catch (Exception $ex) {
                $this->smarty->assign('alerta', 'Error');
                $this->smarty->assign('alerta_errores', $ex->getMessage());
                $this->showUpdate($get);
                exit();
            }
        } else {
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->showUpdate($get);
        }
    }

    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }

    public function show()
    {
        $cerveza = new TipoCerveza();
        $lista_cervezas = $cerveza->getList($cerveza->getTotalNo());
        if (!empty($lista_cervezas)) {
            $this->smarty->assign('cervezas', $lista_cervezas);
        }
        $this->smarty->display("Views/Cervezas/cervezas.tpl");
    }

    public function showAdd()
    {
        $this->smarty->display("Views/Cervezas/alta.cervezas.tpl");
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
                $tc = new TipoCerveza($params['id']);
                $this->smarty->assign('descripcion', $tc->getDescripcion());
                $this->smarty->assign('ibu', $tc->getIbu());
                $this->smarty->assign('abv', $tc->getAbv());
                $this->smarty->assign('srm', $tc->getSrm());
                $this->smarty->assign('precio_x_litro', $tc->getPrecioXLitro());
                $this->smarty->assign('foto', $tc->getNombreImagen());
                $this->smarty->assign('id', $tc->getIdTC());
                $this->smarty->display("Views/Cervezas/modificacion.cervezas.tpl");
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro la cerveza');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a una cerveza valida']);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro la cerveza');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }
}
