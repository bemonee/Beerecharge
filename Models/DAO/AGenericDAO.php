<?php

namespace Models\DAO;

use Exception;
use Models\DAO\Exceptions\CreateException;
use Models\DAO\Exceptions\DeleteException;
use Models\DAO\Exceptions\NotFoundException;
use Models\DAO\Exceptions\NotUniqueException;
use Models\DAO\Exceptions\ReadException;
use Models\DAO\Exceptions\SaveException;
use Models\DAO\Exceptions\UpdateException;

/**
 * Clase generica que contiene funcionalidad en comun de todos los daos
 * Patron Active Record
 * Wrapper de Entidad de datos
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
abstract class AGenericDAO
{

    /**
     * Nombre de la tabla
     * @var string
     */
    protected $tabla;

    /**
     * Nombre de las columnas de las claves primarias de la tabla
     * @var array
     */
    protected $primkeys;

    /**
     * Columnas permitidas para ABM
     * @var array
     */
    protected $fields;

    /**
     * Consulta Principal
     * @var string
     */
    protected $sql;

    /**
     * Directorio donde se encuentran los modelos
     * @var type
     */
    protected $models_namespace;

    // Campos en comun de todos los modelos

    /**
     * Protected variable
     * @var varchar $creado_por
     */
    protected $creado_por;

    /**
     * Protected variable
     * @var timestamp $creado_en
     */
    protected $creado_en;

    /**
     * Protected variable
     * @var timestamp $modificado_en
     */
    protected $modificado_en;

    /**
     * Constructor
     * @param string $tabla
     * @param array $primKeys
     * @param array $fields
     * @param type $id
     */
    public function __construct($tabla, $primKeys, $fields, $id = 0)
    {
        $this->tabla = $tabla;
        $this->primkeys = $primKeys;
        $this->fields = $fields;
        // Campos en comun para todos los modelos
        $this->fields = array_merge($this->fields, ['creado_por', 'creado_en', 'modificado_en']);
        $this->sql = "SELECT * FROM {$this->tabla}";
        if ($id) {
            $this->read($id);
        }
    }

    public function getCreadoPor()
    {
        return $this->creado_por;
    }

    public function setCreadoPor($creado_por)
    {
        $this->creado_por = $creado_por;
    }

    public function getCreadoEn()
    {
        return $this->creado_en;
    }

    public function setCreadoEn($creado_en)
    {
        $this->creado_en = $creado_en;
    }

    public function getModificadoEn()
    {
        return $this->modificado_en;
    }

    public function setModificadoEn($modificado_en)
    {
        $this->modificado_en = $modificado_en;
    }

    /**
     * Devuelve una sola clave primaria
     * @return mixed
     */
    public function getId()
    {
        $pkfield = $this->primkeys[0];
        return $this->$pkfield;
    }

    /**
     * Devuelve todas las claves primarias como un array asociativo
     * @return array
     */
    public function getIds()
    {
        $ids = array();
        foreach ($this->primkeys as $pk) {
            $ids[$pk] = $this->$pk;
        }
        return $ids;
    }

    /**
     * Obtiene una fila de la db y llena las variables de clase
     * @param string $sql SQL statement
     * @throws NotFoundException
     * @throws ReadException
     */
    public function fetch($sql)
    {
        $db = DataBase::getInstance();
        if ($rst = $db->query($sql)) {
            if ($rst->num_rows) {
                $row = $rst->fetch_assoc();
                $this->populate($row);
                $rst->free();
            } else {
                throw new NotFoundException($sql);
            }
        } else {
            throw new ReadException($sql);
        }
    }

    /**
     * Rellena las variables de clase de los objetos hijos en base a un array
     * @param array $array array de columnas => valor
     */
    public function populate($array)
    {
        foreach ($array as $key => $val) {
            if (in_array($key, array_merge($this->primkeys, $this->fields))) { //solo lleno los permitidos
                $this->$key = $val;
            }
        }
    }

    /**
     * Sanea y rellena variables de clase de los objetos hijos en base a un array
     * @param array $array array de columnas => valor
     */
    public function sanitize($array)
    {
        $db = DataBase::getInstance();
        foreach ($array as $key => $val) {
            if (in_array($key, array_merge($this->primkeys, $this->fields))) { //solo lleno los permitidos
                $this->$key = $db->real_escape_string($val);
            }
        }
    }

    /**
     * Agrega campos de tabla a una consulta
     * @param string $sql SQL consulta
     */
    protected function addFields(&$sql)
    {
        $fields = array();

        foreach ($this as $var => $value) {
            if (in_array($var, $this->fields)) { //solo lleno los permitidos
                $fields[] = (is_null($value) || $value === 'NULL') ? "$var=NULL" : "$var='$value'";
            }
        }
        $sql .= implode(',', $fields);
    }

    /**
     * Retorna el objeto del tipo dado por la variable $Class y llena dinamicamente
     * las propiedades que correspondan a las columnas dadas por la consulta
     * @param string $sql SQL consulta
     * @param string $Class nombre de clase
     * @return Object
     * @throws ReadException
     * @throws Exception
     */
    protected function getObject($sql, $Class)
    {
        if (class_exists($Class)) {
            $db = DataBase::getInstance();
            if ($rst = $db->query($sql)) {
                $Object = $rst->fetch_object($Class);
                $rst->free();
            } else {
                throw new ReadException($sql);
            }
        } else {
            throw new Exception("La clase no existe: $Class");
        }
        return $Object;
    }

    /**
     * Retorna un objeto del tipo actual
     * @param string $sql SQL consulta
     * @return self
     */
    protected function getSelfObject($sql)
    {
        return $this->getObject($sql, get_class($this));
    }

    /**
     * Retorna  un array de objetos del tipo dado por la variable $Class y llena dinamicamente
     * las propiedades que correspondan a las columnas dadas por la consulta
     * @param string $sql SQL consulta
     * @param string $Class nombre de clase
     * @return Object[]
     * @throws ReadException
     * @throws Exception
     */
    protected function getObjects($sql, $Class)
    {
        $Objects = array();
        if (class_exists($Class)) {
            $db = DataBase::getInstance();
            if ($rst = $db->query($sql)) {
                while ($Object = $rst->fetch_object($Class)) {
                    $Objects[] = $Object;
                }
                $rst->free();
            } else {
                throw new ReadException($sql);
            }
        } else {
            throw new Exception("La clase no existe: {$Class}!");
        }
        return $Objects;
    }

    /**
     * Retorna un array de objetos del tipo actual
     * @param string $sql SQL consulta
     * @return self[]
     */
    protected function getSelfObjects($sql)
    {
        return $this->getObjects($sql, get_class($this));
    }

    /**
     * Retorna un solo numero, util para contar registros
     * @param string $sql
     * @return numero
     */
    protected function getSingleNum($sql)
    {
        $db = DataBase::getInstance();
        if ($rst = $db->query($sql)) {
            $row = $rst->fetch_row();
            $rst->free();
            return (int) $row[0];
        } else {
            return 0;
        }
    }

    /**
     * Retorna una lista de todos los objetos
     * @param INTEGER $limit
     * @param INTEGER $offset
     * @return Object[]
     */
    public function getList($limit = 100, $offset = 0)
    {
        $sql = "{$this->sql} LIMIT {$limit} OFFSET {$offset}";
        return $this->getSelfObjects($sql);
    }

    /**
     * Retorna un array asociativo en base una consulta
     * @param string $sql SQL consulta con al menos dos columnas
     * @return array('id'=>'value')
     * @throws ReadException
     */
    protected function getAssocArray($sql)
    {
        $list = array();
        $db = DataBase::getInstance();
        if ($rst = $db->query($sql)) {
            while ($row = $rst->fetch_row()) {
                $list[$row[0]] = $row[1];
            }
            $rst->free();
            return $list;
        } else {
            throw new ReadException($sql);
        }
    }

    /**
     * Retorna la cantidad total de registros
     * @return int
     */
    public function getTotalNo()
    {
        $sql = "SELECT COUNT(1) FROM {$this->tabla} LIMIT 1";
        return $this->getSingleNum($sql);
    }

    /**
     * Retorna la lista de ids en formato sql
     * @param string $glue (coma o operador AND)
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @return string
     */
    private function getImplodedIds($glue, $ids)
    {
        $wheres = [];
        if ($ids) {
            if (is_array($ids)) {
                foreach ($ids as $id => $val) {
                    $wheres[] = "{$id}='{$val}'";
                }
                $where = implode($glue, $wheres);
            } else {
                $where = " {$this->primkeys[0]}='{$ids}'";
            }
        } else { //si no hay ninguna id uso las claves primarias del objeto
            if ($this->primkeys) {
                foreach ($this->primkeys as $pk) {
                    if ($this->$pk) {
                        $wheres[] = "{$pk}='{$this->$pk}'";
                    } else {
                        $wheres[] = "{$pk}=NULL";
                    }
                }
                $where = implode($glue, $wheres);
            } else {
                $where = '1=1'; // no hay clave
            }
        }
        return $where;
    }

    // ABM ///////////////////////////////////////////////////////////

    /**
     * Lee una fila de la db y llena las variables de objetos dinamicamente
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws ReadException
     */
    public function read($ids = 0)
    {
        $sql = "{$this->sql} WHERE {$this->getImplodedIds(' AND ', $ids)} LIMIT 1";
        $this->fetch($sql);
    }

    /**
     * Lee solo las columnas especificadas de la tabla y llena las variables de objeto dinamicamente
     * @param array $columnas array de columnas
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws ReadException
     */
    public function readColumns($columnas, $ids = 0)
    {
        if (is_array($columnas)) {
            $sql = 'SELECT ' . implode(',', $columnas) . " FROM {$this->tabla} WHERE {$this->getImplodedIds(' AND ', $ids)} LIMIT 1";
            $this->fetch($sql);
        } else {
            throw new Exception('No se especificaron columnas!');
        }
    }

    /**
     * Crea la consulta INSERT dinamicamente y la inserta en la db
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws NotUniqueException
     * @throws CreateException
     */
    public function create($ids = 0)
    {
        $sql = "INSERT INTO {$this->tabla} SET ";

        if ($ids || count($this->primkeys) > 1) { //Si hay mas de una PK
            $sql .= $this->getImplodedIds(',', $ids) . ',';
        }

        $this->addFields($sql);
        $db = DataBase::getInstance();
        if ($db->query($sql)) {
            if (count($this->primkeys) == 1) { //Solo una PK
                $pkfield = $this->primkeys[0];
                $this->$pkfield = $db->insert_id;
            }
        } else {
            if ($db->errno === 1062) { //Violacion de clave unica
                throw new NotUniqueException($sql);
            } else {
                throw new CreateException($sql);
            }
        }
    }

    /**
     * Crea la consulta UPDATE dinamicamente y actualiza un registro en la db
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws NotUniqueException
     * @throws UpdateException
     */
    public function update($ids = 0)
    {
        $sql = "UPDATE {$this->tabla} SET ";

        $this->addFields($sql);

        if (count($this->primkeys) > 0) {
            $sql .= " WHERE {$this->getImplodedIds(' AND ', $ids)} LIMIT 1";
        }
        $db = DataBase::getInstance();
        if (!$db->query($sql)) {
            if ($db->errno === 1062) { //Violacion de clave unica
                throw new NotUniqueException($sql);
            } else {
                throw new UpdateException($sql);
            }
        }
    }

    /**
     * Crea la consulta INSERT+UPDATE dinamicamente y actualiza un registro en la db
     * Si el registro no existe sera creado, sino actualizado
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws SaveException
     */
    public function save($ids = 0)
    {
        $sql = "INSERT INTO {$this->tabla} SET ";

        $sql .= $this->getImplodedIds(',', $ids) . ',';

        $this->addFields($sql);

        $sql .= ' ON DUPLICATE KEY UPDATE '; // Solo MySQL

        $this->addFields($sql);
        $db = DataBase::getInstance();
        if ($db->query($sql)) {
            if (count($this->primkeys) == 1) { //Solo una PK
                $pkfield = $this->primkeys[0];
                $this->$pkfield = $db->insert_id;
            }
        } else {
            throw new SaveException($sql);
        }
    }

    /**
     * Crea la consulta DELETE dinamicamente y elimina un registro en la db
     * @param mixed $ids un valor de clave primaria o un array con PK => valor
     * @throws DeleteException
     */
    public function delete($ids = 0)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE {$this->getImplodedIds(' AND ', $ids)}";
        $db = DataBase::getInstance();
        if (!$db->query($sql)) {
            throw new DeleteException($sql);
        }
    }

    /**
     * Encontra filas de la tabla en base a una lista de columnas/valores
     * @param array $condiciones Array de columnas=>'valor' (condiciones)
     * @throws Exception
     */
    public function find($condiciones = 0)
    {
        if (is_array($condiciones)) {
            $sql = "SELECT * FROM {$this->tabla} WHERE {$this->getImplodedIds(' AND ', $condiciones)} LIMIT 1";
            $this->fetch($sql);
        } else {
            throw new Exception('No se definieron condiciones!');
        }
    }
}
