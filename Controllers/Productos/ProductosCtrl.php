<?php

namespace Controllers\Productos;

use Controllers\AGenericCtrl;
use Controllers\ICrudeable;
use Exception;
use Models\Administrador;
use Models\DAO\Exceptions\DeleteException;
use Models\DAO\Exceptions\NotFoundException;
use Models\Producto;

/**
 * Description of ProductosCtrl
 *
 * @author usuario
 */
class ProductosCtrl extends AGenericCtrl implements ICrudeable
{
    public function add()
    {
        $input = array_merge($_POST, $_FILES);
        $reglas = [
            'descripcion' => 'required|alpha_space|max_len,100',
            'capacidad_lts' => 'required|float|min_numeric,0',
            'factor_precio' => 'required|float|min_numeric,0|max_numeric,1',
            'foto' => 'required_file|extension,png;jpg'
        ];

        $filtros = [
            'descripcion' => 'trim|sanitize_string',
            'capacidad_lts' => 'trim|sanitize_floats',
            'factor_precio' => 'trim|sanitize_floats'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($input);
        if ($params !== false) {
            try {
                /* @var $admin Administrador */
                $admin = $this->getLoggedUser();
                if ($admin->createProducto($params)) {
                    $this->redirect('/productos/');
                }
            } catch (Exception $ex) {
                $this->smarty->assign('alerta', 'Error');
                $this->smarty->assign('alerta_errores', $ex->getMessage());
                $this->showAdd();
                exit();
            }
        } else {
            $this->gump->set_field_names([
                'descripcion' => 'Descripción',
                'capacidad_lts' => 'Capacidad en Litros',
                'factor_precio' => 'Factor de precio',
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
                $p = new Producto($params['id']);
                $this->getLoggedUser()->deleteProducto($p);
                $this->redirect('/productos/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el producto');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un producto valido']);
                $this->show();
            } catch (DeleteException $ex) {
                $this->smarty->assign('alerta', 'No se pudo eliminar el producto');
                $this->smarty->assign('alerta_errores', [$ex->getMessage()]);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro el producto');
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
        $producto = new Producto();
        $lista = $producto->getList($producto->getTotalNo());
        if (!empty($lista)) {
            $this->smarty->assign('productos', $lista);
        }
        $this->smarty->display("Views/Productos/productos.tpl");
    }

    public function showAdd()
    {
        $this->smarty->display("Views/Productos/alta.productos.tpl");
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
                $producto = new Producto($params['id']);
                $this->smarty->assign('descripcion', $producto->getDescripcion());
                $this->smarty->assign('capacidad_lts', $producto->getCapacitadLts());
                $this->smarty->assign('factor_precio', $producto->getFactorPrecio());
                $this->smarty->assign('id', $producto->getIdPROD());
                $this->smarty->display("Views/Productos/modificacion.productos.tpl");
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el producto');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un producto valido']);
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
        $input = array_merge($_POST, $_FILES, $get);
        $reglas = [
            'descripcion' => 'required|alpha_space|max_len,100',
            'capacidad_lts' => 'required|float|min_numeric,0',
            'factor_precio' => 'required|float|min_numeric,0|max_numeric,1',
            'foto' => 'extension,png;jpg',
            'id' => 'required|integer'
        ];

        $filtros = [
            'descripcion' => 'trim|sanitize_string',
            'capacidad_lts' => 'trim|sanitize_floats',
            'factor_precio' => 'trim|sanitize_floats',
            'id' => 'sanitize_numbers'
        ];

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($input);
        if ($params !== false) {
            try {
                /* @var $admin Administrador */
                $p = new Producto($params['id']);
                $admin = $this->getLoggedUser();
                if ($admin->updateProducto($p, $params)) {
                    $this->redirect('/productos/');
                }
            } catch (Exception $ex) {
                $this->smarty->assign('alerta', 'Error');
                $this->smarty->assign('alerta_errores', $ex->getMessage());
                $this->showUpdate($get);
                exit();
            }
        } else {
            $this->gump->set_field_names([
                'descripcion' => 'Descripción',
                'capacidad_lts' => 'Capacidad en Litros',
                'factor_precio' => 'Factor de precio',
            ]);
            $this->smarty->assign('alerta', 'Datos incorrectos');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->showUpdate($get);
        }
    }
}
