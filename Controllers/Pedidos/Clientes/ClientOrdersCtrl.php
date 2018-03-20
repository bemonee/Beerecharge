<?php

namespace Controllers\Pedidos\Clientes;

use Controllers\AGenericCtrl;
use Controllers\ICrudeable;
use Exception;
use Includes\Utils;
use Models\Cliente;
use Models\DAO\Exceptions\NotFoundException;
use Models\Envio;
use Models\Pedido;
use Models\Producto;
use Models\Sucursal;
use Models\TipoCerveza;
use const GOOGLE_MAPS_API_KEY;

/**
 * Description of ClientOrdersCtrl
 *
 * @author ramir
 */
class ClientOrdersCtrl extends AGenericCtrl implements ICrudeable
{
    public function add()
    {
        $recargas_filtradas = [];
        $cervezas = $_POST['linea_cerveza'];
        foreach ($cervezas as $i => $cerveza) {
            $datos = [
                'cerveza' => $cerveza,
                'producto' => $_POST['linea_producto'][$i],
                'cantidad' => $_POST['linea_cantidad'][$i]
            ];
            $linea_validada = $this->gump->is_valid($datos, [
                'cerveza' => 'required|integer',
                'producto' => 'required|integer',
                'producto' => 'required|integer'
            ]);

            if ($linea_validada) {
                $filtrada = $this->gump->filter($datos, [
                    'cerveza' => 'sanitize_numbers',
                    'producto' => 'sanitize_numbers',
                    'producto' => 'sanitize_numbers'
                ]);
                array_push($recargas_filtradas, $filtrada);
            }
        }

        if (count($recargas_filtradas)) {
            // Hay lineas de pedidos, paso a procesar el resto de los datos
            if ($_POST['entrega'] === 'envio') {
                // La validacion se hace contra iso 8601
                $_POST['fecha_entrega'] = Utils::dateToISO($_POST['fecha_entrega']);
                $reglas = [
                    'fecha_entrega' => 'required|date',
                    'direccion' => 'required|street_address|max_len,200',
                    'slider-input-min' => 'required',
                    'slider-input-max' => 'required'
                ];

                $filtros = [
                    'fecha_entrega' => 'trim|sanitize_string',
                    'direccion' => 'trim|sanitize_string',
                    'slider-input-min' => 'sanitize_string',
                    'slider-input-max' => 'sanitize_string'
                ];
            } else { // retiro en sucursal
                $reglas = [
                    'sucursal' => 'required|integer'
                ];

                $filtros = [
                    'sucursal' => 'sanitize_numbers'
                ];
            }

            $this->gump->validation_rules($reglas);
            $this->gump->filter_rules($filtros);
            $params = $this->gump->run($_POST);
            if ($params !== false) {
                if ($params['entrega'] === 'envio') {
                    $envio = new Envio();
                    $envio->setDireccion($params['direccion']);
                    $envio->setFechaEntrega($params['fecha_entrega']);
                    $envio->setRangoHoraMin($params['slider-input-min']);
                    $envio->setRangoHoraMax($params['slider-input-max']);
                    $sucursal = null;
                } else {
                    $envio = null;
                    $sucursal = new Sucursal($params['sucursal']);
                }
                try {
                    /* @var $cliente Cliente */
                    $cliente = $this->getLoggedUser();
                    $cliente->createPedido($recargas_filtradas, $envio, $sucursal);
                    $this->redirect('/clients/orders/');
                } catch (Exception $exc) {
                    $this->smarty->assign('alerta', 'No se pudo realizar el pedido');
                    $this->smarty->assign('alerta_errores', [$exc->getMessage()]);
                    $this->showAdd();
                }
            } else {
                $this->gump->set_field_names([
                    'fecha_entrega' => 'Fecha de Entrega',
                    'slider-input-min' => 'Rango Horario Desde',
                    'slider-input-max' => 'Rango Horario Hasta'
                ]);
                $this->smarty->assign('alerta', 'Datos invalidos');
                $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
                $this->showAdd();
            }
        } else {
            $this->smarty->assign('alerta', 'No se pudo realizar el pedido');
            $this->smarty->assign('alerta_errores', ['Por favor ingrese alguna recarga']);
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
                $p = new Pedido($params['id']);
                $this->getLoggedUser()->deletePedido($p);
                $this->redirect('/clients/orders/');
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el pedido');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un pedido valido']);
                $this->show();
            }
        } else {
            $this->smarty->assign('alerta', 'No se encontro el pedido');
            $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
            $this->show();
        }
    }

    public function getAllowedProfiles()
    {
        return ['Cliente'];
    }

    public function show()
    {
        /* @var $cliente Cliente */
        $cliente = $this->getLoggedUser();
        $lista = $cliente->getPedidos();
        if (!empty($lista)) {
            $this->smarty->assign('pedidos', $lista);
        }

        $this->smarty->assignByRef('util', (new Utils()));
        $this->smarty->display('Views/Pedidos/Clientes/pedidos.tpl');
    }

    public function showAdd()
    {
        $cliente = $this->getLoggedUser();
        $this->initDynamicFields();

        $this->smarty->assign('direccion', $cliente->getDomicilio());
        $this->smarty->assign("GOOGLE_MAPS_API_KEY", GOOGLE_MAPS_API_KEY);

        $this->smarty->display('Views/Pedidos/Clientes/alta.pedidos.tpl');
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
                $pedido = new Pedido($params['id']);
                $this->smarty->assign('pedido', $pedido);
                $this->initDynamicFields();
                $this->smarty->assign("GOOGLE_MAPS_API_KEY", GOOGLE_MAPS_API_KEY);
                $this->smarty->display("Views/Pedidos/Clientes/modificacion.pedidos.tpl");
            } catch (NotFoundException $exc) {
                $this->smarty->assign('alerta', 'No se encontro el pedido');
                $this->smarty->assign('alerta_errores', ['El id no corresponde a un pedido valido']);
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
        $recargas_filtradas = [];
        $cervezas = $_POST['linea_cerveza'];
        $input = array_merge($get, $_POST);
        foreach ($cervezas as $i => $cerveza) {
            $datos = [
                'cerveza' => $cerveza,
                'producto' => $input['linea_producto'][$i],
                'cantidad' => $input['linea_cantidad'][$i]
            ];
            $linea_validada = $this->gump->is_valid($datos, [
                'cerveza' => 'required|integer',
                'producto' => 'required|integer',
                'producto' => 'required|integer'
            ]);

            if ($linea_validada) {
                $filtrada = $this->gump->filter($datos, [
                    'cerveza' => 'sanitize_numbers',
                    'producto' => 'sanitize_numbers',
                    'producto' => 'sanitize_numbers'
                ]);
                array_push($recargas_filtradas, $filtrada);
            }
        }

        if (count($recargas_filtradas)) {
            // Hay lineas de pedidos, paso a procesar el resto de los datos
            if ($input['entrega'] === 'envio') {
                // La validacion se hace contra iso 8601
                $input['fecha_entrega'] = Utils::dateToISO($input['fecha_entrega']);
                $reglas = [
                    'id' => 'required|integer',
                    'fecha_entrega' => 'required|date',
                    'direccion' => 'required|street_address|max_len,200',
                    'slider-input-min' => 'required',
                    'slider-input-max' => 'required'
                ];

                $filtros = [
                    'id' => 'sanitize_numbers',
                    'fecha_entrega' => 'trim|sanitize_string',
                    'direccion' => 'trim|sanitize_string',
                    'slider-input-min' => 'sanitize_string',
                    'slider-input-max' => 'sanitize_string'
                ];
            } else { // retiro en sucursal
                $reglas = [
                    'id' => 'required|integer',
                    'sucursal' => 'required|integer'
                ];

                $filtros = [
                    'id' => 'sanitize_numbers',
                    'sucursal' => 'sanitize_numbers'
                ];
            }

            $this->gump->validation_rules($reglas);
            $this->gump->filter_rules($filtros);
            $params = $this->gump->run($input);
            if ($params !== false) {
                if ($params['entrega'] === 'envio') {
                    $envio = new Envio();
                    $envio->setDireccion($params['direccion']);
                    $envio->setFechaEntrega($params['fecha_entrega']);
                    $envio->setRangoHoraMin($params['slider-input-min']);
                    $envio->setRangoHoraMax($params['slider-input-max']);
                    $sucursal = null;
                } else {
                    $envio = null;
                    $sucursal = new Sucursal($params['sucursal']);
                }
                try {
                    $pedido = new Pedido($params['id']);
                    /* @var $cliente Cliente */
                    $cliente = $this->getLoggedUser();
                    $cliente->updatePedido($pedido, $recargas_filtradas, $envio, $sucursal);
                    $this->redirect('/clients/orders/');
                } catch (Exception $exc) {
                    $this->smarty->assign('alerta', 'No se pudo actualizar el pedido');
                    $this->smarty->assign('alerta_errores', [$exc->getMessage()]);
                    $this->showUpdate($get);
                }
            } else {
                $this->gump->set_field_names([
                    'fecha_entrega' => 'Fecha de Entrega',
                    'slider-input-min' => 'Rango Horario Desde',
                    'slider-input-max' => 'Rango Horario Hasta'
                ]);
                $this->smarty->assign('alerta', 'Datos invalidos');
                $this->smarty->assign('alerta_errores', $this->gump->get_readable_errors());
                $this->showUpdate($get);
            }
        } else {
            $this->smarty->assign('alerta', 'No se pudo actualizar el pedido');
            $this->smarty->assign('alerta_errores', ['Por favor ingrese alguna recarga']);
            $this->showUpdate($get);
        }
    }

    protected function initDynamicFields()
    {
        $tc = new TipoCerveza();
        $lista_cervezas = $tc->getList($tc->getTotalNo());
        if (count($lista_cervezas)) {
            $this->smarty->assign('cervezas', $lista_cervezas);
        }

        $productos = new Producto();
        $lista_productos = $productos->getList($productos->getTotalNo());
        if (count($lista_productos)) {
            $this->smarty->assign('productos', $lista_productos);
        }

        $sucursal = new Sucursal();
        $lista_sucursales = $sucursal->getList($sucursal->getTotalNo());
        if (!empty($lista_sucursales)) {
            $this->smarty->assign('sucursales', $lista_sucursales);
        }
    }
}
