<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:18:20
  from "C:\xampp\htdocs\Beerecharge\Views\Menus\sidebar\client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a3c371924_17832721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa40220cec83db2100db308149a669bb39bfeca6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Menus\\sidebar\\client.tpl',
      1 => 1508366404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a442a3c371924_17832721 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="list-group">
  <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/" class="list-group-item">
    <i class="fa fa-home fa-fw" aria-hidden="true"></i> Home
  </a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/" class="list-group-item">
    <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Pedidos
  </a>
</div><?php }
}
