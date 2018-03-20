<?php

namespace Models\DAO;

require_once 'Configs/db.inc';

use mysqli;
use const DB_HOST;
use const DB_NAME;
use const DB_PASS;
use const DB_USER;

/**
 * Clase singleton de Base de Datos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 * @internal
 */
class DataBase
{
    /*
     * Database variable
     * @var mysqli
     */

    protected static $db;

    final protected function __construct()
    {
    }

    /**
     * @return MySQLi
     */
    public static function getInstance()
    {
        if (!is_object(self::$db)) {
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
        return self::$db;
    }

    protected function __destruct()
    {
        if (self::$db) {
            self::$db->close();
        }
    }

    protected function __clone()
    {
    }
}
