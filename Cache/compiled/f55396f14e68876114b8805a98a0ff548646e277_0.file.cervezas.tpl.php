<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:55
  from "C:\xampp\htdocs\Beerecharge\Views\Cervezas\cervezas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429e75fa8a0_96840537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f55396f14e68876114b8805a98a0ff548646e277' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Cervezas\\cervezas.tpl',
      1 => 1512003603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429e75fa8a0_96840537 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213175a4429e7595d94_63531609', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109065a4429e75a03b0_28127229', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163315a4429e75f68e1_99771437', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_213175a4429e7595d94_63531609 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Cervezas<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_109065a4429e75a03b0_28127229 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-beer fa-fw" aria-hidden="true"></i> Cervezas<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_163315a4429e75f68e1_99771437 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Tipos de Cerveza</h5>
            </div>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/cervezas/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nueva
                </a>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center justify-content-lg-start">
    <?php if (isset($_smarty_tpl->tpl_vars['cervezas']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cervezas']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
        <div class="mx-2 mt-3">
            <!--Card-->
            <div class="card cerveza">
                <!--Card image-->
                <div class="view overlay hm-white-slight foto-cerveza hm-zoom">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['c']->value->getRutaImagen();?>
" class="img-fluid" alt="">
                    <div class="mask"></div>
                </div>
                <!--Card content-->
                <div class="card-body text-center">
                    <!--Title-->
                    <h4 class="card-title my-0"><?php echo $_smarty_tpl->tpl_vars['c']->value->getDescripcion();?>
</h4>
                    <!--Text-->
                    <p class="card-text mt-0">
                        <strong>ABV</strong> %<?php echo $_smarty_tpl->tpl_vars['c']->value->getAbv();?>

                        <strong>IBU</strong> <?php echo $_smarty_tpl->tpl_vars['c']->value->getIbu();?>
 
                        <strong>SRM</strong> <?php echo $_smarty_tpl->tpl_vars['c']->value->getSrm();?>

                        <br>
                        $<?php echo $_smarty_tpl->tpl_vars['c']->value->getPrecioXLitro();?>
 <strong>por litro</strong>
                    </p>
                    <div class="botones-cerveza">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/cervezas/update/<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdTC();?>
/">
                            <i class="fa fa-pencil-square-o fa-lg fa-fw"></i>
                        </a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/cervezas/delete/<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdTC();?>
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
            <p>* No se encontraron cervezas cargadas <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/cervezas/add/" class="orange-text">¿Desea agregar una?</a></p>
        </div>
    <?php }?>
    </div>
<?php
}
}
/* {/block "section"} */
}
