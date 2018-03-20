<?php

namespace Models;

/**
 *
 * @author rpereyra <bemonee@gmail.com>
 */
interface IPerfilable
{
    public function changeProfile($params);
    
    public function changePassword($pass, $pass_nueva);
}
