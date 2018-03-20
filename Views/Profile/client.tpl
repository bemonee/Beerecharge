{extends file='layout.tpl'}

{block name="title"}Mis Datos{/block}

{block name="section_title"}<i class="fa fa-cog fa-fw" aria-hidden="true"></i> Mis Datos{/block}
{block name="section"}
    <div class="row">
        <div class="col-6">
            <form action="{$p_dir}/clients/updateconfig/" method="POST">
                <p class="lead"><i class="fa fa-caret-right fa-fw" aria-hidden="true"></i> Info de contacto</p>
                <div class="md-form form-sm">
                    <i class="fa fa-user prefix"></i>
                    <input type="text" id="user" value="{$user}" disabled>
                    <label for="form11" class="disabled">Usuario</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-address-card prefix"></i>
                    <input type="text" id="nombre_registro" name="nombre" class="form-control" value="{$nombre}">
                    <label for="nombre_registro">Nombre y Apellido</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-envelope prefix"></i>
                    <input type="text" id="email_registro" name="email" class="form-control" value="{$email}">
                    <label for="email_registro">Email</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-map-marker prefix"></i>
                    <input type="text" id="domicilio_registro" name="direccion" class="form-control" value="{$direccion}">
                    <label for="domicilio_registro">Domicilio</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-phone prefix"></i>
                    <input type="text" id="telefono_registro" name="telefono" class="form-control" value="{$telefono}">
                    <label for="telefono_registro">Telefono</label>
                </div>
                <p class="lead"><i class="fa fa-caret-right fa-fw" aria-hidden="true"></i> Cambio de contraseña</p>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="pass_registro" name="pass" class="form-control">
                    <label for="pass_registro">Contraseña Actual</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="pass_registro_nueva" name="pass_nueva" class="form-control">
                    <label for="pass_registro_nueva">Nueva Contraseña</label>
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
{/block}

{block name="jsadicional" append}
    <!-- Form Validator -->
    <script src="{$p_dir}/Assets/js/form-validator/jquery.form-validator.min.js"></script>
    
    <script>
        $.validate();
    </script>
{/block}
