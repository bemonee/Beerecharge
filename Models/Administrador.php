<?php

namespace Models;

use DateTime;
use Exception;
use Includes\Upload\Upload;
use Includes\Utils;
use Models\DAO\AAdministradorDAO;
use Models\DAO\Exceptions\NotFoundException;

/**
 * Capa de negocio de administradores
 *
 * @author Ramiro Agustin Pereyra Noreiko <bemonee@gmail.com>
 * @since 0.1
 */
class Administrador extends AAdministradorDAO implements IPerfilable
{
    use TAuthenticatable;

    public function getCreationDate()
    {
        $creado_en = new DateTime($this->getCreadoEn());
        return $creado_en->format('d/m/Y');
    }

    public function addAdministrador($params)
    {
        $user = $params['user'];
        $pass = $params['pass'];
        $nombre = $params['nombre'];
        if ($this->findByUsuario($user) === null) {
            $a = new Administrador();
            $a->setUsuario($user);
            $a->setNombreApellido($nombre);
            $a->setPassword($this->generatePassword($pass));
            $a->setCreadoPor($this->getUsuario());
            $this->setCreadoEn(Utils::getCurrentTimestamp());
            $a->create();
            return true;
        }
        return false;
    }

    public function updateAdministrador(Administrador $admin, $params)
    {
        $pass = $params['pass'];
        $admin->setNombreApellido($params['nombre']);
        $admin->setModificadoEn(Utils::getCurrentTimestamp());
        if (!empty($pass)) {
            $admin->setPassword($admin->generatePassword($pass));
        }
        $admin->update();
        return true;
    }

    public function deleteAdministrador(Administrador $admin)
    {
        return $admin->delete();
    }

    public function changeProfile($params)
    {
        $nombre = $params['nombre'];

        $this->nombre_apellido = $nombre;
        $this->modificado_en = Utils::getCurrentTimestamp();
        $this->update(); // si falla el cambio de contraseña ya tengo los cambios guardados
    }

    public function changePassword($pass, $pass_nueva)
    {
        if ($this->canLogin($pass, $this->getPassword())) {
            $this->setPassword($this->generatePassword($pass_nueva));
            $this->update();
            return true;
        }
        return false;
    }

    /**
     * Intenta crear una cerveza
     *
     * @param string $nombre_archivo
     * @param array $params
     * @return boolean true en caso de exito
     * @throws Exception si fallo algo
     */
    public function createCerveza($params)
    {
        $tc = new TipoCerveza();
        try {
            $tc->find(['descripcion' => $params['descripcion']]);
            if ($tc !== null) {
                throw new Exception("La cerveza " . $params['descripcion'] . " ya se encuentra dada de alta en el sistema");
            }
        } catch (NotFoundException $ex) {
            // Proceso imagen
            $path_imagen = null;
            if ($this->resizeImage($params['foto'], 'cervezas', $path_imagen)) {
                $this->initCerveza($tc, $params, $path_imagen);
                $tc->setCreadoPor($this->getUsuario());
                $tc->setCreadoEn(Utils::getCurrentTimestamp());
                $tc->create();
            }
        }
        return true;
    }

    /**
     * Intenta modificar una cerveza y modificar su foto si fue subida nuevamente
     *
     * @param TipoCerveza $tc
     * @param string $upload_file
     * @param array $params
     * @return boolean true en caso de exito
     * @throws Exception si fallo algo
     */
    public function updateCerveza(TipoCerveza $tc, $params)
    {
        // Proceso imagen
        $foto = $params['foto'];
        $path_imagen = $tc->getRutaImagen();
        if (isset($foto) && $foto['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($this->resizeImage($foto, 'cervezas', $path_imagen)) {
                unlink($tc->getRutaImagen()); // Borro la anterior
            } else {
                return false;
            }
        }

        $this->initCerveza($tc, $params, $path_imagen);
        $tc->setModificadoEn(Utils::getCurrentTimestamp());
        $tc->update();
        return true;
    }

    public function deleteCerveza(TipoCerveza $tc)
    {
        $tc->delete();
    }

    /**
     * Inicializa un objeto del tipo cerveza
     *
     * @param TipoCerveza $tc
     * @param array $params
     * @param string $path_imagen
     */
    private function initCerveza(TipoCerveza $tc, $params, $path_imagen)
    {
        $tc->setDescripcion($params['descripcion']);
        $tc->setAbv($params['abv']);
        $tc->setIbu($params['ibu']);
        $tc->setSrm($params['srm']);
        $tc->setRutaImagen(str_replace('\\', '/', $path_imagen));
        $tc->setPrecioXLitro($params['precio_x_litro']);
    }

    /**
     * Intenta crear un producto
     *
     * @param string $nombre_archivo
     * @param array $params
     * @return boolean true en caso de exito
     * @throws Exception si fallo algo
     */
    public function createProducto($params)
    {
        $p = new Producto();
        try {
            $p->find(['descripcion' => $params['descripcion']]);
            if ($p !== null) {
                throw new Exception("El producto " . $params['descripcion'] . " ya se encuentra dado de alta en el sistema");
            }
        } catch (NotFoundException $ex) {
            // Proceso imagen
            $path_imagen = null;
            if ($this->resizeImage($params['foto'], 'productos', $path_imagen)) {
                $this->initProducto($p, $params, $path_imagen);
                $p->setCreadoPor($this->getUsuario());
                $p->setCreadoEn(Utils::getCurrentTimestamp());
                $p->create();
            }
        }
        return true;
    }

    /**
     * Intenta modificar una cerveza y modificar su foto si fue subida nuevamente
     *
     * @param Producto $p
     * @param string $upload_file
     * @param array $params
     * @return boolean true en caso de exito
     * @throws Exception si fallo algo
     */
    public function updateProducto(Producto $p, $params)
    {
        // Proceso imagen
        $foto = $params['foto'];
        $path_imagen = $p->getRutaImagen();
        if (isset($foto) && $foto['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($this->resizeImage($foto, 'productos', $path_imagen)) {
                unlink($p->getRutaImagen()); // Borro la anterior
            } else {
                return false;
            }
        }

        $this->initProducto($p, $params, $path_imagen);
        $p->setModificadoEn(Utils::getCurrentTimestamp());
        $p->update();
        return true;
    }

    public function deleteProducto(Producto $p)
    {
        $p->delete();
    }

    private function initProducto(Producto $p, $params, $path_imagen)
    {
        $p->setDescripcion($params['descripcion']);
        $p->setCapacitadLts($params['capacidad_lts']);
        $p->setFactorPrecio($params['factor_precio']);
        $p->setRutaImagen(str_replace('\\', '/', $path_imagen));
    }

    public function updatePedido(Pedido $pedido, $estado)
    {
        if ($pedido->getEstado() !== $estado) {
            $pedido->setEstado($estado);
            $timestamp = Utils::getCurrentTimestamp();
            $pedido->setModificadoEn($timestamp);
            if ($estado == Pedido::FINALIZADO) {
                $pedido->setFechaEntrega($timestamp);
            } else {
                $pedido->setFechaEntrega(null);
            }
            $pedido->update();
        }
    }

    public function createSucursal($params)
    {
        $sucursal = new Sucursal();
        $sucursal->setDescripcion($params['descripcion']);
        $sucursal->setDireccion($params['direccion']);
        $sucursal->setCreadoPor($this->getUsuario());
        $sucursal->setCreadoEn(Utils::getCurrentTimestamp());
        $sucursal->create();
    }

    public function updateSucursal($params)
    {
        $sucursal = new Sucursal($params['id']);
        $sucursal->setDescripcion($params['descripcion']);
        $sucursal->setDireccion($params['direccion']);
        $sucursal->setModificadoEn(Utils::getCurrentTimestamp());
        $sucursal->update();
    }
    
    public function deleteSucursal(Sucursal $p)
    {
        $p->delete();
    }

    /**
     * Intenta redimensionar una imagen
     *
     * @param string $nombre_archivo
     * @param string $path_destino
     * @return boolean
     * @throws Exception
     */
    private function resizeImage($nombre_archivo, $concepto, &$path_destino)
    {
        $handle = new Upload($nombre_archivo, 'es_ES');
        if ($handle->uploaded) {
            $handle->file_name_body_pre = 'thumb_';
            $handle->image_resize = true;
            $handle->image_x = 300;
            $handle->image_y = 200;
            $handle->image_ratio = true;
            $handle->image_ratio_crop = true;
            $handle->process('Assets/img/' . $concepto);
            $path_destino = $handle->file_dst_pathname;
            $handle->clean();
        } else {
            throw new Exception($handle->error);
        }
        return $handle->processed;
    }
}
