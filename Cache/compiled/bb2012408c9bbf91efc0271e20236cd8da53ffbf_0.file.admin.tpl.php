<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:04
  from "C:\xampp\htdocs\Beerecharge\Views\Menus\navbar\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429b482edc8_55356608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb2012408c9bbf91efc0271e20236cd8da53ffbf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Menus\\navbar\\admin.tpl',
      1 => 1509584978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4429b482edc8_55356608 (Smarty_Internal_Template $_smarty_tpl) {
?>
<a class="dropdown-item waves-effect waves-light" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/"><i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;Administradores</a>
<a class="dropdown-item waves-effect waves-light" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/config/"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;Mis datos</a>
<a class="dropdown-item waves-effect waves-light" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/logout/"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;&nbsp;Salir</a>                                <?php }
}
