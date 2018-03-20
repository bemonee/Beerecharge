<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:17:35
  from "C:\xampp\htdocs\Beerecharge\Views\Reportes\reportes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a0f5dbf10_29181932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f6a8db88b45e74509ac705e358b20ba093b5766' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Reportes\\reportes.tpl',
      1 => 1511829798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a442a0f5dbf10_29181932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_186205a442a0f5c7652_86793041', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_287415a442a0f5cd881_84759791', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9225a442a0f5d94d9_58834923', "section");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_186205a442a0f5c7652_86793041 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Reportes<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_287415a442a0f5cd881_84759791 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-info fa-fw" aria-hidden="true"></i> Reportes<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_9225a442a0f5d94d9_58834923 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12">
            <div class="float-left">
                <div>
                    <h5>Listado de reportes</h5>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="list-group">
              <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/reports/litros_entre_fechas/" class="list-group-item">
                <i class="fa fa-hand-o-right fa-fw" aria-hidden="true"></i>
                Litros de cervezas solicitados entre fechas
              </a>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "section"} */
}
