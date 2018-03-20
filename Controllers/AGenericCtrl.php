<?php

namespace Controllers;

// Smarty tiene su propio autoloader, lo requiero de esta forma si no usa el mio
require_once('Includes/smarty/Smarty.php');
require_once("Configs/app.inc");

use Includes\Gump\GUMP;
use Models\DAO\AUsuarioDAO;
use Smarty;
use const BASE_PATH;

/**
 * Description of GenericCtrl
 *
 * @author rpereyra <bemonee@gmail.com>
 */
abstract class AGenericCtrl
{

    /**
     * Motor de Templates
     * @var Smarty
     */
    protected $smarty = null;

    /**
     * Saneado
     * @var GUMP
     */
    protected $gump = null;

    /**
     * Directorio base donde se encuentran todos los modelos
     * @var string
     */
    protected $models_base_dir = null;

    /**
     * Directorio de proyecto
     */
    protected $p_dir = null;

    /**
     * Constructor
     * @param type $privilegios
     */
    public function __construct()
    {
        $this->smarty = new Smarty();
        // Directorio para el almacenaje de templates compilados
        $this->smarty->setTemplateDir('./Views');
        $this->smarty->setCacheDir('./Cache');
        $this->smarty->setCompileDir('./Cache/compiled');
        $this->smarty->loadFilter("output", "trimwhitespace");

        /* Saneo todo parametro que venga por POST o GET */
        $this->gump = GUMP::get_instance();
        if ($_POST) {
            $_POST = $this->gump->sanitize($_POST);
        }

        if ($_GET) {
            $_GET = $this->gump->sanitize($_GET);
        }

        $this->models_base_dir = '\\Models\\';

        $path = dirname(dirname(__FILE__));
        $this->p_dir = substr($path, strrpos($path, '\\'));
        $this->p_dir = str_replace('\\', '/', $this->p_dir);
        $this->smarty->assign('p_dir', $this->p_dir);
    }

    /**
     * Metodo base para todas las controladoras encargado de
     */
    abstract public function show();

    /**
     * Redirige a una url dada, si no se especifica va al root.
     * @param string $url
     */
    public function redirect($url = null)
    {
        $dominio = $_SERVER['HTTP_HOST'];
        $proyecto = BASE_PATH;
        header("Location: http://$dominio$proyecto$url");
        exit();
    }

    /**
     * Devuelve el metodo por defecto de toda controladora
     *
     * @return string
     */
    public function getDefaultMethod()
    {
        return 'show';
    }

    /**
     * Devuelve el usuario logueado
     * @return AUsuarioDAO
     */
    protected function getLoggedUser()
    {
        if (isset($_SESSION['usuario'])) {
            return $_SESSION['usuario'];
        }
        return null;
    }

    /**
     * Verifica si el objeto pasado por parametro corresponde a los modelos con acceso
     * @param mixed $obj
     * @return boolean
     */
    public function profileIsAllowed($obj)
    {
        $permitidos = $this->getAllowedProfiles();
        if (empty($permitidos)) {
            return true;
        }
        $obj_class = str_replace('Models\\', '', get_class($obj));
        return in_array($obj_class, $permitidos);
    }

    /**
     * Devuelve un array con los nombres de los tipos de usuarios que pueden acceder a la sección
     * @return array
     */
    abstract public function getAllowedProfiles();
}
