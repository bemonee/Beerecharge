<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:39
  from "C:\xampp\htdocs\Beerecharge\Views\Profile\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429d7ad0364_73967828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47f612d7983dce9e0bcadc40f9483653e0be0732' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Profile\\admin.tpl',
      1 => 1509668302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429d7ad0364_73967828 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_325935a4429d7ab1df6_75958436', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_50465a4429d7ab7f84_81439980', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_22315a4429d7acd2b0_17841266', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_325935a4429d7ab1df6_75958436 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Mis Datos<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_50465a4429d7ab7f84_81439980 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-cog fa-fw" aria-hidden="true"></i> Mis Datos<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_22315a4429d7acd2b0_17841266 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-6">
            <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/updateconfig/" method="POST">
                <div class="md-form form-sm">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="user" value="<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
" disabled>
                    <label for="form11" class="disabled">Usuario</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-address-card prefix"></i>
                    <input type="text" id="nombre_registro" name="nombre" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
">
                    <label for="nombre_registro">Nombre y Apellido</label>
                </div>
                <p class="lead"><i class="fa fa-caret-right fa-fw" aria-hidden="true"></i> Cambio de contraseña</p>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="pass_registro" name="pass" class="form-control">
                    <label for="pass_registro">Contraseña Actual</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="pass_registro_nueva" name="pass_nueva" class="form-control">
                    <label for="pass_registro_nueva">Nueva Contraseña</label>
                </div>
                <div class="text-center">
                    <button class="btn btn-sm btn-amber">
                        <i class="fa fa-save fa-fw"></i>&nbsp;Guardar
                    </button>
                </div>  
            </form>
        </div>
        <div class="col-6 border border-light border-top-0 border-right-0 border-bottom-0">
            
        </div>
    </div>
<?php
}
}
/* {/block "section"} */
}
