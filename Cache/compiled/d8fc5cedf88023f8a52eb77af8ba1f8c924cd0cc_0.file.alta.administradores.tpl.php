<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:34
  from "C:\xampp\htdocs\Beerecharge\Views\Administradores\alta.administradores.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429d2882cd8_15844362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8fc5cedf88023f8a52eb77af8ba1f8c924cd0cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Administradores\\alta.administradores.tpl',
      1 => 1510073521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429d2882cd8_15844362 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27735a4429d285ac20_73416986', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130345a4429d2864c68_97291326', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107155a4429d287f393_72080354', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_27735a4429d285ac20_73416986 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Administradores<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_130345a4429d2864c68_97291326 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i> Alta de administrador<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_107155a4429d287f393_72080354 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-6">
            <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/add/" method="POST">
                <div class="md-form form-sm">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="user" name="user" class="form-control">
                    <label for="form11">Usuario</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-address-card prefix"></i>
                    <input type="text" id="nombre_registro" name="nombre" class="form-control">
                    <label for="nombre_registro">Nombre y Apellido</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="pass_registro" name="pass" class="form-control">
                    <label for="pass_registro">Contraseña</label>
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
