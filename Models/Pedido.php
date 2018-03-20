<?php

namespace Models;

use Includes\Utils;
use Models\DAO\APedidoDAO;

/**
 * Capa de negocio de pedidos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Pedido extends APedidoDAO
{
    const SOLICITADO = 0;
    const EN_PROCESO = 1;
    const ENVIADO = 2;
    const FINALIZADO = 3;

    /**
     * Devuelve el valor total del pedido
     * @param boolean [optional] $redondeo por defecto se redondea
     * @return integer|float
     */
    public function getValorTotal($redondeo = true)
    {
        $total = 0;
        $recargas = $this->getRecargas();
        if (!empty($recargas)) {
            foreach ($recargas as $r) {
                $total += $r->getValor();
            }
        }
        if ($redondeo) {
            $total = round($total);
        }
        return $total;
    }

    /**
     * Devuelve la cantidad de litros recargados por pedido
     * @param boolean [optional] $redondeo por defecto no se redondea
     *
     */
    public function getLitroTotales($redondeo = false)
    {
        $total = 0;
        $recargas = $this->getRecargas();
        if (empty($recargas)) {
            foreach ($recargas as $r) {
                $total += $r->getLitros();
            }
        }
        if ($redondeo) {
            $total = round($total);
        }
        return $total;
    }
    
    /**
     * Agrupa las recargas repetidas y aumenta su cantidad
     * @param type $recargas
     * @return type
     */
    private function groupRecargasByCantidad($recargas)
    {
        $recargas_agrupadas = [];
        foreach ($recargas as $r) {
            $c = $r['cerveza'];
            $p = $r['producto'];
            $cant = $r['cantidad'];
            @$recargas_agrupadas[$c][$p] = $recargas_agrupadas[$c][$p] + $cant;
        }
        return $recargas_agrupadas;
    }
    
    /**
     * Inserta recargas
     * @param type $recargas
     * @param Pedido $pedido
     * @param type $fecha_creacion
     */
    public function insertRecargas($recargas)
    {
        $recargas_agrupadas = $this->groupRecargasByCantidad($recargas);
        if (count($recargas_agrupadas)) {
            $this->deleteRecargas();
            $recarga = new Recarga();
            $recarga->setCreadoEn(Utils::getCurrentTimestamp());
            $recarga->setCreadoPor($this->getCliente()->getUsuario());
            $recarga->setIdPED($this->getIdPED());
            foreach ($recargas_agrupadas as $idTC => $r) {
                $keys = array_keys($r);
                foreach ($keys as $idPROD) {
                    $cantidad = $r[$idPROD];
                    $recarga->setIdTC($idTC);
                    $recarga->setIdPROD($idPROD);
                    $recarga->setCantidad($cantidad);
                    $recarga->create();
                }
            }
        }
    }
    
    /**
     * Elimina todas las recargas asociasdas al pedido
     */
    public function deleteRecargas()
    {
        $recargas = $this->getRecargas();
        if (count($recargas)) {
            // Si tengo vieja las vuelo e inserto las nuevas
            $recargas[0]->delete([$this->primkeys[0] => $this->getIdPED()]);
        }
    }
    
    public function delete($ids = 0)
    {
        parent::delete($ids);
        $this->deleteRecargas();
    }
}
