<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:49
  from "C:\xampp\htdocs\Beerecharge\Views\Sucursales\alta.sucursales.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429e1ace916_85563913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c61e72d14ad62970184527b1f0c6b89b272b884f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Sucursales\\alta.sucursales.tpl',
      1 => 1509063572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429e1ace916_85563913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183135a4429e1a9fd88_81178261', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_254865a4429e1ab82d3_32708172', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_224475a4429e1ac84d5_06362506', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_183135a4429e1a9fd88_81178261 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Sucursales<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_254865a4429e1ab82d3_32708172 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="float-left">
        <i class="fa fa-building-o fa-fw" aria-hidden="true"></i> Nueva Sucursal
    </div>
    <div class="float-right">
        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_224475a4429e1ac84d5_06362506 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-6">
            <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/add/" method="POST">
                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
                    <label for="descripcion">Descripción</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-globe prefix"></i>
                    <input type="text" id="direccion" name="direccion" class="form-control">
                    <label for="direccion">Dirección</label>
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
