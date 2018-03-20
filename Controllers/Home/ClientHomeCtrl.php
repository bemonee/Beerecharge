<?php

namespace Controllers\Home;

use Controllers\AGenericCtrl;
use Models\Cliente;
use Models\Pedido;

/**
 * Description of DashboardCtrl
 *
 * @author usuario
 */
class ClientHomeCtrl extends AGenericCtrl
{
    public function show()
    {
        /* @var $client Cliente */
        $client = $this->getLoggedUser();

        if (empty($client->getNombreApellido())) {
            $this->smarty->assign('nombre', $client->getUsuario());
        } else {
            $this->smarty->assign('nombre', $client->getNombreApellido());
        }

        // Verifico si es la primera vez que se loguea para que llene sus datos
        if ($client->getModificadoEn() === null) {
            $this->smarty->assign('primera_vez', true);
        }
        // Info de estado de pedidos
        $preferida = $client->getFavouriteTipoCerveza();
        if ($preferida === null) { // si no tiene birra preferida no realizo ningun pedido
            $this->smarty->assign('no_hay_pedidos', true);
        } else {
            $this->smarty->assign('birra_preferida', $preferida);
        }
        $this->smarty->display('Views/Home/client.tpl');
    }

    public function getAllowedProfiles()
    {
        return ['Cliente'];
    }
}
