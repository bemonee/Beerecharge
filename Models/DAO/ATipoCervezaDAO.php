<?php

namespace Models\DAO;

use Models\Recarga;
use Models\TipoCerveza;

/**
 * Capa de acceso a datos para tipos de cerveza
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class ATipoCervezaDAO extends AGenericDAO
{

    /**
     * Protected variable
     * (PK)->Primary key
     * @var int $idTC
     */
    protected $idTC;

    /**
     * Protected variable
     * @var varchar $descripcion
     */
    protected $descripcion;

    /**
     * Protected variable
     * @var decimal $abv
     */
    protected $abv;

    /**
     * Protected variable
     * @var int $ibu
     */
    protected $ibu;

    /**
     * Protected variable
     * @var nt $srm
     */
    protected $srm;

    /**
     * Protected variable
     * @var varchar $ruta_imagen
     */
    protected $ruta_imagen;

    /**
     * Protected variable
     * @var float $precio_x_litro
     */
    protected $precio_x_litro;

    /**
     * Constructor
     * @var mixed $id
     */
    public function __construct($id = 0)
    {
        $tabla = 'tipo_cervezas';
        $primkeys = ['idTC'];
        $fields = ['descripcion', 'abv', 'ibu', 'srm', 'ruta_imagen', 'precio_x_litro'];
        parent::__construct($tabla, $primkeys, $fields, $id);
    }

    public function getIdTC()
    {
        return $this->idTC;
    }

    public function setIdTC($idTC)
    {
        $this->idTC = $idTC;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getRutaImagen()
    {
        return $this->ruta_imagen;
    }

    public function setRutaImagen($ruta_imagen)
    {
        $this->ruta_imagen = $ruta_imagen;
    }

    public function getPrecioXLitro()
    {
        return $this->precio_x_litro;
    }

    public function setPrecioXLitro($precio_x_litro)
    {
        $this->precio_x_litro = $precio_x_litro;
    }

    public function getAbv()
    {
        return $this->abv;
    }

    public function setAbv($abv)
    {
        $this->abv = $abv;
    }

    public function getIbu()
    {
        return $this->ibu;
    }

    public function setIbu($ibu)
    {
        $this->ibu = $ibu;
    }

    public function getSrm()
    {
        return $this->srm;
    }

    public function setSrm($srm)
    {
        $this->srm = $srm;
    }

    /**
     * Recargas - tabla referida
     * @return Recarga[]
     */
    public function getRecargas()
    {
        $sql = "SELECT * FROM recargas WHERE idTC='{$this->idTC}'";
        return $this->getObjects($sql, 'Models\Recarga');
    }

    /**
     * Primary Key Finder
     * @return TipoCerveza
     */
    public function findByIdTC($idTC)
    {
        $sql = "SELECT * FROM tipo_cervezas WHERE idTC='$idTC' LIMIT 1";
        return $this->getSelfObject($sql);
    }
}
