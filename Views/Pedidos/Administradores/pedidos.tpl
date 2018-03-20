{extends file='layout.tpl'}
{block name="title"}Pedidos{/block}
{block name="section_title"}<i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Pedidos Realizados{/block}
{block name="cssadicional" append}
    <!-- Propeller -->
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/select2/css/typography.css">
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/select2/css/textfield.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/select2/css/select2-bootstrap.css">
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/select2/css/pmd-select2.css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/datepicker/css/bootstrap-datepicker.min.css">
{/block}
{block name="section"}
    <div class="row">
        <div class="col-12">
            <div class="float-left">
                <div>
                    <h5>Listado de pedidos realizados</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mr-auto">
            <div class="md-form form-sm">
                <i class="fa fa-calendar prefix"></i>
                <input type="text" class="form-control" id="fecha_entrega" name="fecha_entrega">
                <label for="fecha_entrega">Fecha de Solicitud</label>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mt-2 mr-auto">
            <div class="md-form form-sm">
                {if isset($clientes)}
                    <select class="selectCliente pmd-select2 form-control" id="cliente" name="cliente">
                        <option value="0" selected>Cliente</option>
                        {foreach $clientes as $c}
                            <option value="{$c->getIdCLIENTE()}">{$c->getNombreApellido()}</option>
                        {/foreach}
                    </select>
                {else}
                    <select class="selectCliente pmd-select2 form-control" id="cliente" name="cliente">
                        <option value="0" selected>Cliente</option>
                    </select>
                {/if}
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mt-2 mr-auto">
            <div class="md-form form-sm">
                {if isset($sucursales)}
                    <select class="selectSucursal pmd-select2 form-control" id="sucursal" name="sucursal">
                        <option value="0" selected>Sucursal</option>
                        {foreach $sucursales as $c}
                            <option value="{$c->getIdSUC()}">{$c->getDescripcion()}</option>
                        {/foreach}
                    </select>
                {else}
                    <select class="selectSucursal pmd-select2 form-control" id="sucursal" name="sucursal">
                        <option value="0" selected>Sucursal</option>
                    </select>
                {/if}
            </div>
        </div>
        <div class="col-1 mr-auto">
            <a id="btnBuscar" class="btn btn-sm btn-amber px-2">
                <i class="fa fa-search fa-fw"></i>
            </a>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped mt-2" id="tablaPedidos">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Cliente</th>
                  <th>Tipo de Entrega</th>
                  <th>Fecha Solicitud</th>
                  <th>Total</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody id="filasPedidos">
                {include file='Views/Pedidos/Administradores/pedidos.items.tpl'}
              </tbody>
            </table>
        </div>
    </div>
    <div id="loading" class="d-none">
        <ul class="bokeh">
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
{/block}

{block name="jsadicional" append}
    <!-- Select2js -->
    <script src="{$p_dir}/Assets/plugins/select2/js/select2.full.js"></script>
    <script src="{$p_dir}/Assets/plugins/select2/js/pmd-select2.js"></script>
    <!-- Datepicker -->
    <script src="{$p_dir}/Assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{$p_dir}/Assets/plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#fecha_entrega').datepicker({
                language: 'es',
                clearBtn: true,
                autoclose: true,
                assumeNearbyYear: true
            });
        });
        
        $('.selectSucursal, .selectCliente').select2({
            theme: "bootstrap"
        });
        
        initSelectsEstado();
        
        $("#btnBuscar").click(function(){
            var fecha = $("#fecha_entrega").val().replace(/\//g, "-");
            if(!fecha.length){
                fecha = "0";
            }
            var url = "{$p_dir}/admins/orders/getPedidosByFilters/"+fecha+"/"+$("#cliente").val()+"/"+$("#sucursal").val()+"/";
            $.ajax({
                url: url,
                cache: false,
                beforeSend: function( ) {
                    $("#filasPedidos").addClass('d-none');
                    $("#loading").removeClass('d-none');
                    
                }
            })
            .done(function( data ) {
                $("#filasPedidos").empty();
            })
            .fail(function( data ) {
               alert("Parametros mal formados");
            })
            .always(function(data) {
                $("#filasPedidos").append(data.data);
                initSelectsEstado();
                $("#loading").addClass('d-none');
                $("#filasPedidos").removeClass('d-none');
            });
        });
        
        function initSelectsEstado(){
            $('.selectEstado').select2({
                theme: "bootstrap"
            });
            
            $('.selectEstado').on('change', function() {
                $.ajax({
                    url: "{$p_dir}/admins/orders/update/"+$(this).data("idped")+"/",
                    cache: false,
                    method: 'post',
                    data: {
                        'estado' : $(this).val()
                    },
                })
                .done(function( data ) {
                    $("#btnBuscar").click();
                })
                .fail(function( data ) {
                    alert("Parametros mal formados");
                })
            })
        }
    </script>
{/block}