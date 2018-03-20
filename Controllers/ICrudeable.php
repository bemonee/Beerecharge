<?php

namespace Controllers;

/**
 *
 * @author usuario
 */
interface ICrudeable extends IAddeable, IUpdatable, IDeletable
{
    public function showUpdate($get = array());
    public function showAdd();
}
