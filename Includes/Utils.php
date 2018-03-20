<?php

namespace Includes;

use DateTime;

/**
 * Clase contenedora de funciones Utiles
 *
 * @author rpereyra <bemonee@gmail.com>
 */
class Utils
{
    public static function getCurrentTimestamp()
    {
        return (new DateTime())->format("Y-m-d H:i:s");
    }

    public static function dateToISO($fecha)
    {
        if ($fecha) {
            $fecha = str_replace("/", "-", $fecha); // DateTime no entiende el separador
            $dateTime = new DateTime($fecha);
            return $dateTime->format("Y-m-d");
        }
        return null;
    }

    public static function timestampToDDMMYYYYHHIISS($fecha)
    {
        return (new DateTime($fecha))->format("d-m-Y H:i:s");
    }
}
