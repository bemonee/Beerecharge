<?php

namespace Models;

use Exception;
use Includes\Utils;
use Models\DAO\AClienteDAO;

/**
 * Capa de negocio de clientes
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Cliente extends AClienteDAO implements IPerfilable
{
    use TAuthenticatable;

    public function register($user, $pass)
    {
        if ($this->findByUsuario($user) === null) {
            $this->usuario = $user;
            $this->password = $this->generatePassword($pass);
            $this->creado_por = $user;
            $this->creado_en = Utils::getCurrentTimestamp();
            $this->create();
            return true;
        }
        return false;
    }

    public function changeProfile($params)
    {
        $email = $params['email'];
        $nombre = $params['nombre'];
        $direccion = $params['direccion'];
        $telefono = $params['telefono'];

        $this->email = $email;
        $this->nombre_apellido = $nombre;
        $this->domicilio = $direccion;
        $this->telefono = $telefono;
        $this->modificado_en = Utils::getCurrentTimestamp();
        $this->update(); // si falla el cambio de contraseña ya tengo los cambios guardados
    }

    public function changePassword($pass, $pass_nueva)
    {
        if ($this->canLogin($pass, $this->getPassword())) {
            $this->setPassword($this->generatePassword($pass_nueva));
            $this->update();
            return true;
        }
        return false;
    }

    /**
     * Crea un pedido en base un array de linea de recargas
     * @param array $recargas array de array de clave valor con los siguientes keys: cerveza, producto, cantidad
     * @param Envio $envio
     * @param Sucursal $sucursal
     * @throws Exception
     */
    public function createPedido($recargas, Envio $envio = null, Sucursal $sucursal = null)
    {
        if (is_array($recargas) && count($recargas)) {
            $pedido = new Pedido();
            $pedido->setIdCLIENTE($this->getIdCLIENTE());
            $pedido->setEstado(Pedido::SOLICITADO);
            $timestamp = Utils::getCurrentTimestamp();
            $creado_por = $this->getUsuario();
            if ($envio !== null && $sucursal === null) {
                // inserto el envio y luego que tengo id se lo doy a pedido
                $envio->setCreadoEn($timestamp);
                $envio->setCreadoPor($creado_por);
                $envio->create();
                $pedido->setIdENV($envio->getIdENV());
                $pedido->setIdSUC(null);
            } else {
                $pedido->setIdENV(null);
                $pedido->setIdSUC($sucursal->getIdSUC());
            }
            $pedido->setCreadoEn($timestamp);
            $pedido->setCreadoPor($creado_por);
            $pedido->create();
            $pedido->insertRecargas($recargas, $timestamp);
        } else {
            throw new Exception("No se pasaron recargas validas");
        }
    }
    
    public function updatePedido(Pedido $pedido, $recargas, Envio $envio = null, Sucursal $sucursal = null)
    {
        if (is_array($recargas) && count($recargas)) {
            $pedido->setIdCLIENTE($this->getIdCLIENTE());
            $pedido->setEstado(Pedido::SOLICITADO);
            $timestamp = Utils::getCurrentTimestamp();
            $creado_por = $this->getUsuario();
            
            $envio_anterior = $pedido->getEnvio();
            if ($envio !== null && $sucursal === null) { // tengo que evaluar si el anterior era envio o sucursal
                if ($envio_anterior !== null) { // Era un envio y el nuevo es un envio, hago update del anterior
                    $envio_anterior->setDireccion($envio->getDireccion());
                    $envio_anterior->setFechaEntrega($envio->getFechaEntrega());
                    $envio_anterior->setRangoHoraMin($envio->getRangoHoraMin());
                    $envio_anterior->setRangoHoraMax($envio->getRangoHoraMax());
                    $envio_anterior->setModificadoEn($timestamp);
                    $envio_anterior->update();
                } else { // El anterior era una sucursal
                    $envio->setCreadoEn($timestamp);
                    $envio->setCreadoPor($creado_por);
                    $envio->create();
                    $pedido->setIdENV($envio->getIdENV());
                }
                $pedido->setIdSUC(null);
            } else {
                if ($envio_anterior !== null) { // Era un envio y ahora es una sucursal, lo tengo que volar
                    $envio_anterior->delete();
                }
                $pedido->setIdENV(null);
                $pedido->setIdSUC($sucursal->getIdSUC());
            }
            $pedido->setModificadoEn($timestamp);
            $pedido->update();
            $pedido->insertRecargas($recargas, $timestamp);
        } else {
            throw new Exception("No se pasaron recargas validas");
        }
    }
    
    public function deletePedido(Pedido $pedido)
    {
        if ($pedido->getEstado() == Pedido::SOLICITADO) {
            $pedido->delete();
            $pedido->deleteRecargas(); // Solo por si acaso, las fks deberian hacer el laburo.
        }
    }

    /**
     * Devuelve el tipo de cerveza mas pedida
     * @return TipoCerveza
     */
    public function getFavouriteTipoCerveza()
    {
        $birra_preferida = [];
        $pedidos = $this->getPedidos();
        if (count($pedidos)) {
            foreach ($pedidos as $p) {
                // Contador de tipo de cerveza pedidas
                $recargas = $p->getRecargas();
                foreach ($recargas as $r) {
                    $tc = $r->getTipoCerveza();
                    @$birra_preferida[$tc->getIdTC()]['cant'] ++;
                    if (!isset($birra_preferida[$tc->getIdTC()]['obj'])) { // el obj solo lo asigno una vez
                        $birra_preferida[$tc->getIdTC()]['obj'] = $tc;
                    }
                }
            }
            $preferida = array_shift($birra_preferida);
            if (count($birra_preferida)) {
                foreach ($birra_preferida as $bp) {
                    if ($bp['cant'] > $preferida['cant']) {
                        $preferida = $bp;
                    }
                }
            }
            return $preferida['obj'];
        }
        return null;
    }
}
