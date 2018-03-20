<?php
/* Smarty version 3.1.30, created on 2017-12-03 17:01:35
  from "C:\xampp\htdocs\Beerecharge\Views\template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a241fdf4bcea1_93558701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76ac928cc7caf009ecaf7413d6c1465bdcbb01db' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\template.tpl',
      1 => 1508970076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cssincludes.tpl' => 1,
    'file:jsincludes.tpl' => 1,
  ),
),false)) {
function content_5a241fdf4bcea1_93558701 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beerecharge -> <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55795a241fdf45e566_49362041', "title");
?>
</title>
    <?php $_smarty_tpl->_subTemplateRender("file:cssincludes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_209045a241fdf46a899_12102693', "cssadicional");
?>

  </head>
  <body class="<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94095a241fdf471cb4_29766972', "mainclass");
?>
">
      <div class="container-fluid">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_93185a241fdf478da9_31377734', "body");
?>

      </div>
      <?php if (isset($_smarty_tpl->tpl_vars['alerta']->value)) {?>
        <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Error</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-times fa-5x mb-3 animated rotateIn"></i>
                            <h6 class=""><?php echo $_smarty_tpl->tpl_vars['alerta']->value;?>
</h6>
                            <?php if (isset($_smarty_tpl->tpl_vars['alerta_errores']->value)) {?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['alerta_errores']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
                                    <small><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</small><br>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            <?php }?>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Entendido</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
      <?php }?>
      <?php $_smarty_tpl->_subTemplateRender("file:jsincludes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173195a241fdf4b7586_85585595', "jsadicional");
?>

  </body>
</html><?php }
/* {block "title"} */
class Block_55795a241fdf45e566_49362041 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "cssadicional"} */
class Block_209045a241fdf46a899_12102693 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "cssadicional"} */
/* {block "mainclass"} */
class Block_94095a241fdf471cb4_29766972 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "mainclass"} */
/* {block "body"} */
class Block_93185a241fdf478da9_31377734 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block "jsadicional"} */
class Block_173195a241fdf4b7586_85585595 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <?php if (isset($_smarty_tpl->tpl_vars['alerta']->value)) {?>
            <?php echo '<script'; ?>
>
            $(document).ready(function(){
                $('#centralModalDanger').modal();
            });
            <?php echo '</script'; ?>
>
        <?php }?>
      <?php
}
}
/* {/block "jsadicional"} */
}
