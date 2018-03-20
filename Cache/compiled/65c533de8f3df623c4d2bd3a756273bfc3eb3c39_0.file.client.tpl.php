<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:18:20
  from "C:\xampp\htdocs\Beerecharge\Views\Home\client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a3c230762_46812067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65c533de8f3df623c4d2bd3a756273bfc3eb3c39' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Home\\client.tpl',
      1 => 1511136859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a442a3c230762_46812067 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_276345a442a3c1fdf34_36388627', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_251555a442a3c205e67_49182662', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_288645a442a3c22d6f3_59366159', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_276345a442a3c1fdf34_36388627 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Home<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_251555a442a3c205e67_49182662 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-home fa-fw" aria-hidden="true"></i> Home<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_288645a442a3c22d6f3_59366159 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h4 class="h4-responsive mb-2">¡Hola <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
!</h4>
    <hr>
    <div class="row">
        <?php if (isset($_smarty_tpl->tpl_vars['primera_vez']->value)) {?>
            <div class="col-4">
                <p>
                    Pareciera que eres nuevo por aqui.<br>
                    Nos gustaria conocer tu verdadero nombre, tus datos serán de utilidad a la hora de realizar pedidos
                </p>
                <a class="btn btn-sm btn-amber" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/config/">
                    <i class="fa fa-cog fa-fw"></i>&nbsp;Mis datos
                </a>
            </div> 
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['no_hay_pedidos']->value)) {?>
            <div class="col-4">
                <p>
                    ¿Nunca has probado nuestra cerveza?.<br>
                    Es el momento de descubrir tu nueva favorita.
                </p>
                <a class="btn btn-sm btn-amber" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/">
                    <i class="fa fa-cart-plus fa-fw"></i>&nbsp;Realizar Pedido
                </a>
            </div> 
        <?php } else { ?>
            <div class="col-4">
                <p class="mb-1">
                    Hoy es un buen día para una <strong><?php echo $_smarty_tpl->tpl_vars['birra_preferida']->value->getDescripcion();?>
</strong>.<br>
                    ¿Apeteces una?
                </p>
                <a class="btn btn-sm btn-amber" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/">
                    <i class="fa fa-smile-o fa-fw"></i>&nbsp;Si!
                </a>
            </div>
        <?php }?>
        
    </div>
    
<?php
}
}
/* {/block "section"} */
}
