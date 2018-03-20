<?php

namespace Controllers\Home;

use Controllers\AGenericCtrl;

/**
 * Description of AdminHomeCtrl
 *
 * @author usuario
 */
class AdminHomeCtrl extends AGenericCtrl
{
    public function show()
    {
        $this->smarty->display('Views/Home/admin.tpl');
    }

    public function getAllowedProfiles()
    {
        return ['Administrador'];
    }
}
