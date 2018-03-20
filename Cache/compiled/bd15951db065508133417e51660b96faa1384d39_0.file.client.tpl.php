<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:18:20
  from "C:\xampp\htdocs\Beerecharge\Views\Menus\navbar\client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a3c316d24_83254885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd15951db065508133417e51660b96faa1384d39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Menus\\navbar\\client.tpl',
      1 => 1509585006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a442a3c316d24_83254885 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="dropdown-item waves-effect waves-light" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/config/"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;Mis datos</a>
<a class="dropdown-item waves-effect waves-light" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/logout/"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;Salir</a>   <?php }
}
