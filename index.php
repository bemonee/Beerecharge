<?php

use Includes\Infraestructure\AltoRouter;
use Models\Administrador;

error_reporting(E_ALL);

require_once("Includes/Infraestructure/Autoloader.php");
require_once("Configs/app.inc");

session_start();

$router = new AltoRouter();
$router->setBasePath(BASE_PATH);

/*
 *  Mapeado de URL
 */
if (!isset($_SESSION['usuario'])) { // No esta logueado
    // Auth Mapping
    $router->map('GET', '/', 'Auth\ClientAuthCtrl#show');

    // Clientes -> Login
    $router->map('POST', '/clients/login/', 'Auth\ClientAuthCtrl#login');
    // Clientes -> Registro
    $router->map('POST', '/clients/register/', 'Auth\ClientAuthCtrl#add');

    // Administradores
    $router->map('POST', '/admins/login/', 'Auth\AdminAuthCtrl#login');
} else {

    // Clientes/Admins Home
    if ($_SESSION['usuario'] instanceof Administrador) {
        //$router->map('GET', '/', 'Home\AdminHomeCtrl#show');
        $router->map('GET', '/', 'Pedidos\Administradores\AdminsOrdersCtrl#show');
    } else {
        $router->map('GET', '/', 'Home\ClientHomeCtrl#show');
    }

    // Clientes -> Logout
    $router->map('GET', '/clients/logout/', 'Auth\ClientAuthCtrl#logout');
    // Clientes -> Perfil -> Mostrar
    $router->map('GET', '/clients/config/', 'Profile\ClientProfileCtrl#show');
    // Clientes -> Perfil -> Update
    $router->map('POST', '/clients/updateconfig/', 'Profile\ClientProfileCtrl#update');
    // Clientes -> Pedidos
    $router->map('GET', '/clients/orders/', 'Pedidos\Clientes\ClientOrdersCtrl#show');
    // Clientes -> Nuevo pedido view
    $router->map('GET', '/clients/orders/add/', 'Pedidos\Clientes\ClientOrdersCtrl#showAdd');
    // Clientes -> Nuevo pedido
    $router->map('POST', '/clients/orders/add/', 'Pedidos\Clientes\ClientOrdersCtrl#add');
    // Clientes -> Modificacion de pedido view
    $router->map('GET', '/clients/orders/update/[i:id]/', 'Pedidos\Clientes\ClientOrdersCtrl#showUpdate');
    // Clientes -> Modificacion
    $router->map('POST', '/clients/orders/update/[i:id]/', 'Pedidos\Clientes\ClientOrdersCtrl#update');
    // Clientes -> Cancelar pedido
    $router->map('GET', '/clients/orders/delete/[i:id]/', 'Pedidos\Clientes\ClientOrdersCtrl#delete');

    // Administradores -> Logout
    $router->map('GET', '/admins/logout/', 'Auth\AdminAuthCtrl#logout');
    // Administradores -> Perfil -> Mostrar
    $router->map('GET', '/admins/config/', 'Profile\AdminProfileCtrl#show');
    // Administradores -> Perfil -> Update
    $router->map('POST', '/admins/updateconfig/', 'Profile\AdminProfileCtrl#update');
    // Administradores -> ABM view
    $router->map('GET', '/admins/', 'Administradores\AdministradoresCtrl#show');
    // Administradores -> Alta view
    $router->map('GET', '/admins/add/', 'Administradores\AdministradoresCtrl#showAdd');
    // Administradores -> Alta
    $router->map('POST', '/admins/add/', 'Administradores\AdministradoresCtrl#add');
    // Administradores -> Modificacion view
    $router->map('GET', '/admins/update/[i:id]/', 'Administradores\AdministradoresCtrl#showUpdate');
    // Administradores -> Modificacion
    $router->map('POST', '/admins/update/[i:id]/', 'Administradores\AdministradoresCtrl#update');
    // Administradores -> Borrar
    $router->map('GET', '/admins/delete/[i:id]/', 'Administradores\AdministradoresCtrl#delete');
    // Administradores -> Pedidos
    $router->map('GET', '/admins/orders/', 'Pedidos\Administradores\AdminsOrdersCtrl#show');
    // Administradores -> Pedidos -> filtro
    $router->map('GET', '/admins/orders/getPedidosByFilters/[:fecha]/[a:cliente]/[i:sucursal]/', 'Pedidos\Administradores\AdminsOrdersCtrl#getPedidosByFilters');
    // Administradores -> Pedidos
    $router->map('POST', '/admins/orders/update/[i:id]/', 'Pedidos\Administradores\AdminsOrdersCtrl#update');
    // Administradores -> Reportes
    $router->map('GET', '/reports/', 'Reportes\ReportsCtrl#show');
    // Administradores -> Reportes - Litros de cervezas solicitados entre fechas
    $router->map('GET', '/reports/litros_entre_fechas/', 'Reportes\ReportsCtrl#showLitrosEntreFechas');
    $router->map('GET', '/reports/litros_entre_fechas/[:fecha_desde]/[:fecha_hasta]/', 'Reportes\ReportsCtrl#getLitrosEntreFechas');
    
    // Sucursales -> ABM view
    $router->map('GET', '/sucursales/', 'Sucursales\SucursalesCtrl#show');
    // Sucursales -> Alta view
    $router->map('GET', '/sucursales/add/', 'Sucursales\SucursalesCtrl#showAdd');
    // Sucursales -> Alta
    $router->map('POST', '/sucursales/add/', 'Sucursales\SucursalesCtrl#add');
    // Sucursales -> Modificacion view
    $router->map('GET', '/sucursales/update/[i:id]/', 'Sucursales\SucursalesCtrl#showUpdate');
    // Sucursales -> Modificacion
    $router->map('POST', '/sucursales/update/[i:id]/', 'Sucursales\SucursalesCtrl#update');
    // Sucursales -> Borrar
    $router->map('GET', '/sucursales/delete/[i:id]/', 'Sucursales\SucursalesCtrl#delete');
    
    // Cervezas -> ABM view
    $router->map('GET', '/cervezas/', 'Cervezas\CervezasCtrl#show');
    // Cervezas -> Alta view
    $router->map('GET', '/cervezas/add/', 'Cervezas\CervezasCtrl#showAdd');
    // Cervezas -> Alta
    $router->map('POST', '/cervezas/add/', 'Cervezas\CervezasCtrl#add');
    // Cervezas -> Borrar
    $router->map('GET', '/cervezas/delete/[i:id]/', 'Cervezas\CervezasCtrl#delete');
    // Cervezas -> Modificacion view
    $router->map('GET', '/cervezas/update/[i:id]/', 'Cervezas\CervezasCtrl#showUpdate');
    // Cervezas -> Modificacion
    $router->map('POST', '/cervezas/update/[i:id]/', 'Cervezas\CervezasCtrl#update');
    
    // Productos -> ABM view
    $router->map('GET', '/productos/', 'Productos\ProductosCtrl#show');
    // Productos -> Alta view
    $router->map('GET', '/productos/add/', 'Productos\ProductosCtrl#showAdd');
    // Productos -> Alta
    $router->map('POST', '/productos/add/', 'Productos\ProductosCtrl#add');
    // Productos -> Borrar
    $router->map('GET', '/productos/delete/[i:id]/', 'Productos\ProductosCtrl#delete');
    // Productos -> Modificacion view
    $router->map('GET', '/productos/update/[i:id]/', 'Productos\ProductosCtrl#showUpdate');
    // Productos -> Modificacion
    $router->map('POST', '/productos/update/[i:id]/', 'Productos\ProductosCtrl#update');
}

$match = $router->match();
if (!$match) {
    echo "ruta invalida";
} else {
    $ctrl_dir = '\\Controllers\\';
    $ctrl_method = explode('#', $match['target']);
    $ctrl_name = $ctrl_dir . $ctrl_method[0];
    if (class_exists($ctrl_name)) {
        $ctrl = new $ctrl_name;
        $method_name = $ctrl_method[1];
        if (method_exists($ctrl, $method_name)) {
            if (isset($_SESSION['usuario'])) {
                // verifico si esta logueado y checkeo permisos de sección
                if ($ctrl->profileIsAllowed($_SESSION['usuario'])) {
                    $ctrl->$method_name($match['params']);
                } else {
                    echo "Acceso restringido";
                }
            } else {
                $ctrl->$method_name();
            }
        } else {
            $ctrl->getDefaultMethod();
        }
    } else {
        echo "Lugar extraño";
    }
}
