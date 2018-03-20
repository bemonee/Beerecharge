<?php

namespace Controllers\Reportes;

use Controllers\AGenericCtrl;
use Includes\Utils;
use Models\TipoCerveza;

/**
 * Description of ReportsCtrl
 *
 * @author ramir
 */
class ReportsCtrl extends AGenericCtrl
{
    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }

    public function show()
    {
        $this->smarty->display('Views/Reportes/reportes.tpl');
    }

    public function showLitrosEntreFechas()
    {
        $this->smarty->display('Views/Reportes/litros_entre_fechas.tpl');
    }

    public function getLitrosEntreFechas($get = array())
    {
        $reglas = [];
        $filtros = [];
        if (!empty($get['fecha_desde'])) {
            $get['fecha_desde'] = Utils::dateToISO($get['fecha_desde']);
            $reglas = array_merge($reglas, [
                'fecha_desde' => 'required|date'
            ]);

            $filtros = array_merge($filtros, [
                'fecha_desde' => 'trim|sanitize_string'
            ]);
        }

        if (!empty($get['fecha_hasta'])) {
            $get['fecha_hasta'] = Utils::dateToISO($get['fecha_hasta']);
            $reglas = array_merge($reglas, [
                'fecha_hasta' => 'required|date'
            ]);

            $filtros = array_merge($filtros, [
                'fecha_hasta' => 'trim|sanitize_string'
            ]);
        }

        $this->gump->validation_rules($reglas);
        $this->gump->filter_rules($filtros);
        $params = $this->gump->run($get);
        if ($params !== false) {
            header('Content-Type: application/json; charset=UTF-8');
            $retorno = [];
            $tc = new TipoCerveza();
            $lista = $tc->getList($tc->getTotalNo());
            if (count($lista)) {
                foreach ($lista as $c) {
                    $lts = $c->getLitrosSolicitadosEntreFechas($params['fecha_desde'], $params['fecha_hasta']);
                    if ($lts !== null) {
                        array_push(
                            $retorno,
                            [
                                'cerveza' => utf8_encode($c->getDescripcion()),
                                'lts' => $lts
                            ]
                        );
                    }
                }
            }
            die(json_encode(array('response' => $retorno)));
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('response' => $this->gump->get_readable_errors())));
        }
    }
}
