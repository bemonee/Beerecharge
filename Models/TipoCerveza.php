<?php

namespace Models;

use Includes\Utils;
use Models\DAO\ATipoCervezaDAO;
use Models\DAO\Exceptions\DeleteException;

/**
 * Capa de negocio de tipo de cervezas
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class TipoCerveza extends ATipoCervezaDAO
{
    public function getNombreImagen()
    {
        $nombre_imagen = $this->getRutaImagen();
        return substr($nombre_imagen, strrpos($nombre_imagen, '/') + 1);
    }
    
    public function delete($ids = 0)
    {
        if (!count($this->getRecargas())) {
            unlink($this->getRutaImagen());
            parent::delete($ids);
        } else {
            throw new DeleteException("La cerveza tiene recargas asociadas");
        }
    }
    
    public function getLitrosSolicitadosEntreFechas($fecha_desde, $fecha_hasta)
    {
        $inicio_cerveza = Utils::dateToISO($this->getCreadoEn());
        if (empty($fecha_hasta)) {
            $fecha_hasta = "9999-99-99";
        }
        if ($inicio_cerveza >= $fecha_desde && $inicio_cerveza <= $fecha_hasta) {
            $lista = $this->getRecargas();
            $lts = 0;
            foreach ($lista as $r) {
                $p = $r->getPedido();
                $fecha_solicitud = Utils::dateToISO($p->getCreadoEn());
                if ($fecha_solicitud >= $fecha_desde && $fecha_solicitud <= $fecha_hasta) {
                    $lts += $r->getLitros();
                }
            }
            return $lts;
        } else {
            return null;
        }
    }
}
