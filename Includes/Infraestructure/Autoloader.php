<?php

namespace Includes\Infraestructure;

/**
 * Description of Autoloader
 *
 * @author rpereyra <bemonee@gmail.com>
 */
class Autoloader
{
    public static function loader($className)
    {
        $filename = str_replace("\\", '/', $className) . ".php";
        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return true;
            }
        }
        return false;
    }
}

spl_autoload_register(__NAMESPACE__ . '\Autoloader::loader');
