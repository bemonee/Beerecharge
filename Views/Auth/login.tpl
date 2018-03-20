{extends file='template.tpl'}

{block name="title"}Login{/block}

{block name="cssadicional"}
<!-- Custom -->
<link rel="stylesheet" href="{$p_dir}/Assets/css/style.css">
{/block}
    
{block name="mainclass"}login-bg{/block}

{block name="body"}
    <div class="row" id="user_login" style="overflow: hidden">
        <div class="col-md-6 login-panel z-depth-5 animated slideInDown" id="user_access">
            <div class="row">
                <div class="col">
                    <h1 class="my-5 text-center"><i class="fa fa-beer"></i> Beerecharge</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-8 m-auto">
                    <form action="{$p_dir}/clients/login/" method="POST">
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
                    <form action="{$p_dir}/admins/login/" method="POST">
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
                    <form action="{$p_dir}/clients/register/" method="POST">                
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
{/block}
{block name="jsadicional" append}
<script>
    var pos_actual = 'user_login';
    
    {if isset($tipo)}
        $(document).ready(function(){
            var tipo = "{$tipo}";
            if(tipo == "Administrador"){
                mostrarAdmin();
            }else{
                mostrarUser();
            }
        });
    {/if}
    
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
</script>    
{/block}