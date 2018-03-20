<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:04
  from "C:\xampp\htdocs\Beerecharge\Views\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429b46f64a7_40484527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ff2c12d54fc3ddd81997431d2d451f7bdc3929' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\layout.tpl',
      1 => 1511137741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template.tpl' => 1,
    'file:Views/Menus/navbar/".((string)$_smarty_tpl->tpl_vars[\'tpl\']->value).".tpl' => 1,
    'file:Views/Menus/sidebar/".((string)$_smarty_tpl->tpl_vars[\'tpl\']->value).".tpl' => 1,
  ),
),false)) {
function content_5a4429b46f64a7_40484527 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_307055a4429b4614e55_06748158', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122465a4429b461c722_25565235', "cssadicional");
?>


<?php if (($_SESSION['usuario'] instanceof Models\Administrador)) {?>
    <?php $_smarty_tpl->_assignInScope('tpl', 'admin');
} else { ?>
    <?php $_smarty_tpl->_assignInScope('tpl', 'client');
}?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_87495a4429b46ea927_02752559', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_295385a4429b46f3cf8_48282073', "jsadicional");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_307055a4429b4614e55_06748158 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Home<?php
}
}
/* {/block "title"} */
/* {block "cssadicional"} */
class Block_122465a4429b461c722_25565235 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Custom -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/css/style.css">
<?php
}
}
/* {/block "cssadicional"} */
/* {block "section_title"} */
class Block_169835a4429b46e28a4_44493408 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_289965a4429b46e8121_76868630 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "section"} */
/* {block "body"} */
class Block_87495a4429b46ea927_02752559 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12 sin-padding-bootstrap">
            <nav class="navbar navbar-expand-lg navbar-light grey lighten-3">
                <a class="navbar-brand" href="#">
                    <strong><i class="fa fa-beer"></i> Beerecharge</strong>
                </a>
                <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown">
                                <i class="fa fa-user"></i> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
                                <?php $_smarty_tpl->_subTemplateRender("file:Views/Menus/navbar/".((string)$_smarty_tpl->tpl_vars['tpl']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-md-2 sidebar sin-padding-bootstrap elegant-color z-depth-1 animated slideInLeft">
            <div class="row">
                <div class="col">
                    <div class="sidebar-menu white-text">
                        <?php $_smarty_tpl->_subTemplateRender("file:Views/Menus/sidebar/".((string)$_smarty_tpl->tpl_vars['tpl']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <!--Panel-->
            <div id="seccionPrincipal" class="card mt-3 animated fadeIn">
                <div class="card-header elegant-color white-text">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169835a4429b46e28a4_44493408', "section_title", $this->tplIndex);
?>

                </div>
                <div class="card-body">
                    <div class="card-text black-text texto-normal">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_289965a4429b46e8121_76868630', "section", $this->tplIndex);
?>

                    </div>
                </div>
            </div>
            <!--/.Panel-->
        </div>
    </div>
<?php
}
}
/* {/block "body"} */
/* {block "jsadicional"} */
class Block_295385a4429b46f3cf8_48282073 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $('#seccionPrincipal').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass("animated fadeIn");
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "jsadicional"} */
}
