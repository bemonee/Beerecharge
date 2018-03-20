<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:17:10
  from "C:\xampp\htdocs\Beerecharge\Views\Productos\productos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429f609ca82_45083317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afb9a2d761d98d5166efae92b1c2ac4ee26c5a3d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Productos\\productos.tpl',
      1 => 1512004095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429f609ca82_45083317 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once 'C:\\xampp\\htdocs\\Beerecharge\\Includes\\smarty\\plugins\\function.math.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203125a4429f5ea0658_92865579', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_186095a4429f5eaf1a1_96243183', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_45025a4429f6098c67_47103912', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_203125a4429f5ea0658_92865579 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Productos<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_186095a4429f5eaf1a1_96243183 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i> Productos<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_45025a4429f6098c67_47103912 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Productos</h5>
            </div>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/productos/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center justify-content-lg-start">
    <?php if (isset($_smarty_tpl->tpl_vars['productos']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
        <div class="mx-2 mt-3">
            <!--Card-->
            <div class="card cerveza">
                <!--Card image-->
                <div class="view overlay hm-white-slight foto-cerveza hm-zoom">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value->getRutaImagen();?>
" class="img-fluid" alt="">
                    <div class="mask"></div>
                </div>
                <!--Card content-->
                <div class="card-body text-center">
                    <!--Title-->
                    <h4 class="card-title my-0"><?php echo $_smarty_tpl->tpl_vars['p']->value->getDescripcion();?>
</h4>
                    <!--Text-->
                    <p class="card-text mt-0">
                        <strong>Capacidad:</strong> <?php echo $_smarty_tpl->tpl_vars['p']->value->getCapacitadLts();?>
 Lts.
                        <br>
                        <?php echo smarty_function_math(array('equation'=>"(1-factor_precio)*100",'factor_precio'=>$_smarty_tpl->tpl_vars['p']->value->getFactorPrecio()),$_smarty_tpl);?>
%
                        <strong>Dto. por capacidad.</strong>
                    </p>
                    <div class="botones-cerveza">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/productos/update/<?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPROD();?>
/">
                            <i class="fa fa-pencil-square-o fa-lg fa-fw"></i>
                        </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/productos/delete/<?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPROD();?>
/">
                            <i class="fa fa-minus-circle fa-lg fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.Card-->
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php } else { ?>
        <div class="col">
            <p>* No se encontraron productos cargados <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/productos/add/" class="orange-text">¿Desea agregar uno?</a></p>
        </div>
    <?php }?>
    </div>
<?php
}
}
/* {/block "section"} */
}
