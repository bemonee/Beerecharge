<?php

namespace Controllers\Pedidos\Administradores;

use Controllers\AGenericCtrl;
use Controllers\IUpdatable;
use Includes\Utils;
use Models\Administrador;
use Models\Cliente;
use Models\Pedido;
use Models\Sucursal;

/**
 * Description of AdminsOrdersCtrl
 *
 * @author ramir
 */
class AdminsOrdersCtrl extends AGenericCtrl implements IUpdatable
{
    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }

    public function show()
    {
        /* @var $admin Administrador */
        $cliente = $this->getLoggedUser();
        $pedidos = new Pedido();
        $lista = $pedidos->getList($pedidos->getTotalNo());
        if (!empty($lista)) {
            $this->smarty->assign('pedidos', $lista);
        }
        
        $sucursales = new Sucursal();
        $lista = $sucursales->getList($sucursales->getTotalNo());
        if (!empty($lista)) {
            $this->smarty->assign('sucursales', $lista);
        }
        
        $cliente = new Cliente();
        $clientes = $cliente->getList($cliente->getTotalNo());
        if (!empty($clientes)) {
            $this->smarty->assign('clientes', $clientes);
        }

        $this->smarty->assignByRef('util', (new Utils()));
        $this->smarty->display('Views/Pedidos/Administradores/pedidos.tpl');
    }
    
    public function getPedidosByFilters($get = array())
    {
        $reglas = [
            'cliente' => 'required|integer',
            'sucursal' => 'required|integer'
        ];

        $filtros = [
            'cliente' => 'trim|sanitize_string',
            'sucursal' => 'sanitize_numbers'
        ];
        
        if (!empty($get['fecha'])) {
            $get['fecha'] = Utils::dateToISO($get['fecha']);
            $reglas = array_merge($reglas, [
                'fecha' => 'required|date'
            ]);

            $filtros = array_merge($filtros, [
                'fecha' => 'trim|sanitize_string'
            ]);
        }

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($get);
        if ($params !== false) {
            header('Content-Type: application/json');
            $lista = (new Pedido())->findByFechaClienteSucursal($params['fecha'], $params['cliente'], $params['sucursal']);
            if (count($lista)) {
                $this->smarty->assignByRef('util', (new Utils()));
                $this->smarty->assign('pedidos', $lista);
            }
            die(json_encode(array('data' => $this->smarty->fetch('Views/Pedidos/Administradores/pedidos.items.tpl'))));
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $this->gump->get_readable_errors())));
        }
    }

    public function update($get = array())
    {
        $input = array_merge($get, $_POST);
        $reglas = [
            'id' => 'required|integer',
            'estado' => 'required|integer'
        ];

        $filtros = [
            'id' => 'sanitize_numbers',
            'estado' => 'sanitize_numbers'
        ];
        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($input);
        if ($params !== false) {
            /* @var $admin Administrador */
            $admin = $this->getLoggedUser();
            try {
                $pedido = new Pedido($params['id']);
                $admin->updatePedido($pedido, $params['estado']);
            } catch (Exception $ex) {
                header('HTTP/1.1 500 Internal Server Error');
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('data' => "No se encontro el pedido a modificar")));
            }
            header('HTTP/1.1 200 OK');
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $this->gump->get_readable_errors())));
        }
    }
}
