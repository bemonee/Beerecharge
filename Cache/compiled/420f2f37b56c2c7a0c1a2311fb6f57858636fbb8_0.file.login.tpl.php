<?php
/* Smarty version 3.1.30, created on 2017-12-03 17:01:35
  from "C:\xampp\htdocs\Beerecharge\Views\Auth\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a241fdf35d0a3_70606155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '420f2f37b56c2c7a0c1a2311fb6f57858636fbb8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Auth\\login.tpl',
      1 => 1508968670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template.tpl' => 1,
  ),
),false)) {
function content_5a241fdf35d0a3_70606155 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198495a241fdf2dd7d0_06662324', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_290705a241fdf2f9541_34100235', "cssadicional");
?>

    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198875a241fdf3054a2_78561343', "mainclass");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55645a241fdf320d23_23233590', "body");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_146615a241fdf356a74_63085980', "jsadicional");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:template.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_198495a241fdf2dd7d0_06662324 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block "title"} */
/* {block "cssadicional"} */
class Block_290705a241fdf2f9541_34100235 extends Smarty_Internal_Block
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
/* {block "mainclass"} */
class Block_198875a241fdf3054a2_78561343 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
login-bg<?php
}
}
/* {/block "mainclass"} */
/* {block "body"} */
class Block_55645a241fdf320d23_23233590 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row" id="user_login" style="overflow: hidden">
        <div class="col-md-6 login-panel z-depth-5 animated slideInDown" id="user_access">
            <div class="row">
                <div class="col">
                    <h1 class="my-5 text-center"><i class="fa fa-beer"></i> Beerecharge</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-8 m-auto">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/login/" method="POST">
                        <p class="h5 text-center mb-4">
                            <i class="fa fa-angle-right"></i> 
                            Acceso a clientes
                            <i class="fa fa-angle-left"></i>
                        </p>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="user" name="user" class="form-control">
                            <label for="user">Usuario</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="pass" name="pass" class="form-control">
                            <label for="pass">Contraseña</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-elegant">Entrar</button>
                        </div>
                        <div class="text-center">
                            <hr>
                            <p>¿No tiene usuario? <a href="#" data-toggle="modal" data-target="#modalRegister">Registrese!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 beer-texture view animated slideInUp" id="user_texture"><div class="mask"></div></div>
    </div>
    <div class="row d-none" id="admin_login" style="overflow: hidden">
        <div class="col-md-6 beer-texture2 view" id="admin_texture"><div class="mask"></div></div>
        <div class="col-md-6 login-panel z-depth-5" id="admin_access">
            <div class="row">
                <div class="col">
                    <h1 class="my-5 text-center"><i class="fa fa-beer"></i> Beerecharge</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-8 m-auto">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/login/" method="POST">
                        <p class="h5 text-center mb-4">
                            <i class="fa fa-angle-right"></i> 
                            Acceso a administradores
                            <i class="fa fa-angle-left"></i>
                        </p>
                        <div class="md-form">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="user" name="user" class="form-control">
                            <label for="user">Usuario</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix grey-text"></i>
                            <input type="password" id="pass" name="pass" class="form-control">
                            <label for="pass">Contraseña</label>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-elegant">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal: Register Form-->
    <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header elegant-color white-text">
                    <h4 class="title"><i class="fa fa-user-plus"></i> Registro</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/register/" method="POST">                
                        <div class="md-form form-sm">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="user_registro" name="user" class="form-control">
                            <label for="user_registro">Usuario</label>
                        </div>
                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="pass_registro" name="pass" class="form-control">
                            <label for="pass_registro">Contraseña</label>
                        </div>

                        <div class="md-form form-sm">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="pass_registro2" name="pass2" class="form-control">
                            <label for="pass_registro2">Repita contraseña</label>
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-elegant">Registrarse <i class="fa fa-sign-in ml-1"></i></button>
                        </div>
                    </form>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Register Form-->
<?php
}
}
/* {/block "body"} */
/* {block "jsadicional"} */
class Block_146615a241fdf356a74_63085980 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
    var pos_actual = 'user_login';
    
    <?php if (isset($_smarty_tpl->tpl_vars['tipo']->value)) {?>
        $(document).ready(function(){
            var tipo = "<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
";
            if(tipo == "Administrador"){
                mostrarAdmin();
            }else{
                mostrarUser();
            }
        });
    <?php }?>
    
    $('body').bind('mousewheel', function(e) {
        if($(this).hasClass('modal-open') === false){
            if(e.originalEvent.wheelDelta / 120 > 0) {
                if(pos_actual == 'admin_login'){
                    mostrarUser();
                }
            } else {
                if(pos_actual == 'user_login'){
                    mostrarAdmin();
                }
            }
        }
    });
    
    function mostrarUser(){
        $("#admin_login").addClass('d-none');
        $("#admin_texture").removeClass('animated');
        $("#admin_texture").removeClass('slideInUp');
        $("#admin_access").removeClass('animated');
        $("#admin_access").removeClass('slideInDown');

        $("#user_login").removeClass('d-none');
        $("#user_texture").addClass('animated');
        $("#user_texture").addClass('slideInUp');
        $("#user_access").addClass('animated');
        $("#user_access").addClass('slideInDown');
        pos_actual = 'user_login';
    }
    
    function mostrarAdmin(){
        $("#user_login").addClass('d-none');
        $("#user_texture").removeClass('animated');
        $("#user_texture").removeClass('slideInUp');
        $("#user_access").removeClass('animated');
        $("#user_access").removeClass('slideInDown');

        $("#admin_login").removeClass('d-none');
        $("#admin_texture").addClass('animated');
        $("#admin_texture").addClass('slideInUp');
        $("#admin_access").addClass('animated');
        $("#admin_access").addClass('slideInDown');
        pos_actual = 'admin_login';
    }
<?php echo '</script'; ?>
>    
<?php
}
}
/* {/block "jsadicional"} */
}
