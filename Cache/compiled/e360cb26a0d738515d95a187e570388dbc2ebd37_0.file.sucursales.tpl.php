<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:42
  from "C:\xampp\htdocs\Beerecharge\Views\Sucursales\sucursales.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429da9d6f10_17292357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e360cb26a0d738515d95a187e570388dbc2ebd37' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Sucursales\\sucursales.tpl',
      1 => 1509058100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429da9d6f10_17292357 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162695a4429da980948_07776282', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136345a4429da986b88_97765527', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_310595a4429da9d3723_20109251', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_162695a4429da980948_07776282 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Sucursales<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_136345a4429da986b88_97765527 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-building-o fa-fw" aria-hidden="true"></i> Sucursales<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_310595a4429da9d3723_20109251 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de sucursales</h5>
            </div>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nueva
                </a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Dirección</th>
                  <th class="text-right">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($_smarty_tpl->tpl_vars['sucursales']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sucursales']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
                    <tr>
                      <th scope="row"><?php echo $_smarty_tpl->tpl_vars['s']->value->getIdSUC();?>
</th>
                      <td><?php echo $_smarty_tpl->tpl_vars['s']->value->getDescripcion();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['s']->value->getDireccion();?>
</td>
                      <td class="text-right">
                          <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/update/<?php echo $_smarty_tpl->tpl_vars['s']->value->getIdSUC();?>
/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/delete/<?php echo $_smarty_tpl->tpl_vars['s']->value->getIdSUC();?>
/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr>
                        <th scope="row" colspan="4"> * No se encontraron sucursales cargadas <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/sucursales/add/" class="orange-text">¿Desea agregar una?</a></th>
                    </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
    </div>
<?php
}
}
/* {/block "section"} */
}
