<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:04
  from "C:\xampp\htdocs\Beerecharge\Views\Menus\sidebar\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429b4896f62_58498126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39406961566433a452c1d68ac2f0ebe1f37e3a31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Menus\\sidebar\\admin.tpl',
      1 => 1511828859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4429b4896f62_58498126 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="list-group">
  <!--<a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/" class="list-group-item">
    <i class="fa fa-home fa-fw" aria-hidden="true"></i> Home
  </a>-->
  <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/" class="list-group-item">
    <i class="fa fa-building-o fa-fw" aria-hidden="true"></i> Sucursales
  </a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/cervezas/" class="list-group-item">
    <i class="fa fa-beer fa-fw" aria-hidden="true"></i> Cervezas
  </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/productos/" class="list-group-item">
    <i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i> Productos
  </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/orders/" class="list-group-item">
    <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Pedidos
  </a>
  </a>
    <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/reports/" class="list-group-item">
    <i class="fa fa-info fa-fw" aria-hidden="true"></i> Reportes
  </a>
</div><?php }
}
