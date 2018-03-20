<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:18:59
  from "C:\xampp\htdocs\Beerecharge\Views\Pedidos\Clientes\alta.pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a639312c7_01433931',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '117dca0fad0a75d37d7209a91b267fe0b30ed1ab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Pedidos\\Clientes\\alta.pedidos.tpl',
      1 => 1512004478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a442a639312c7_01433931 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\xampp\\htdocs\\Beerecharge\\Includes\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100335a442a63614f09_67192271', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_199905a442a636b5689_80061560', "cssadicional");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_91115a442a636c1ea7_37360932', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_229165a442a63864a41_71880225', "section");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13895a442a63928c56_21533239', "jsadicional");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_100335a442a63614f09_67192271 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Pedidos<?php
}
}
/* {/block "title"} */
/* {block "cssadicional"} */
class Block_199905a442a636b5689_80061560 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Propeller -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/css/typography.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/css/textfield.css">
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/css/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/css/pmd-select2.css">
<!-- Material Radio -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/form/css/radio.css">
<!-- Datepicker -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/css/bootstrap-datepicker.min.css">
<!-- Slider -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/nouislider/css/nouislider.min.css">
<?php
}
}
/* {/block "cssadicional"} */
/* {block "section_title"} */
class Block_91115a442a636c1ea7_37360932 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="float-left">
        <i class="fa fa-cart-plus fa-fw" aria-hidden="true"></i> Nuevo Pedido
    </div>
    <div class="float-right">
        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_229165a442a63864a41_71880225 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12">
            <form action="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/add/" method="POST">
                <h5 class="h5-responsive">
                    <i class="fa fa-caret-right fa-fw" aria-hidden="true"></i>
                    <strong> Cerveza</strong>
                    <small class="text-muted">Tipo, envase y cantidad</small>
                </h5>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mr-auto">
                            <div class="md-form form-sm">
                                <?php if (isset($_smarty_tpl->tpl_vars['cervezas']->value)) {?>
                                <select class="selectCerveza pmd-select2 form-control" id="cerveza" name="cerveza">
                                    <option value="0" disabled="disabled" selected>Cerveza</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cervezas']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdTC();?>
" data-precio="<?php echo $_smarty_tpl->tpl_vars['c']->value->getPrecioXLitro();?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->getDescripcion();?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                                <?php } else { ?>
                                    <select class="selectCerveza pmd-select2 form-control" id="cerveza" name="cerveza" disabled>
                                        <option value="0" disabled="disabled" selected>Cerveza</option>
                                    </select>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mr-auto">
                            <div class="md-form form-sm">
                                <?php if (isset($_smarty_tpl->tpl_vars['productos']->value)) {?>
                                <select class="selectProducto pmd-select2 form-control" id="producto" name="producto">
                                    <option value="0" disabled="disabled" selected>Producto</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdPROD();?>
" data-precio="<?php echo $_smarty_tpl->tpl_vars['c']->value->getFactorPrecio();?>
" data-capacidad="<?php echo $_smarty_tpl->tpl_vars['c']->value->getCapacitadLts();?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->getDescripcion();?>
 (<?php echo $_smarty_tpl->tpl_vars['c']->value->getCapacitadLts();?>
 lts)</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </select>
                                <?php } else { ?>
                                    <select class="selectProducto pmd-select2 form-control" id="producto" name="producto" disabled>
                                        <option value="0" disabled="disabled" selected>Producto</option>
                                    </select>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-2 mr-auto">
                            <div class="md-form form-sm">
                                <select class="selectCantidad pmd-select2 form-control" id="cantidad" name="cantidad">
                                  <option value="0" disabled="disabled" selected>Cantidad</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1 mr-auto">
                            <a id="btnAgregarLinea" class="btn btn-sm btn-amber px-2">
                                <i class="fa fa-plus fa-fw"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="divLineas" class="col-12 d-none">
                    <div class='table-responsive'>
                        <table class="table table-sm table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Cerveza</th>
                              <th>Envase</th>
                              <th>Cantidad</th>
                              <th class='border-right-0'>Valor</th>
                              <th class="text-right border-left-0">&nbsp;</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th colspan="5" class="text-right"><strong>Total:</strong> <span id="totalPedido">Sin items</span></th>
                            </tr>
                          </tfoot>
                          <tbody id="lineaPedido">
                          </tbody>
                        </table>
                    </div>
                </div>
                <div id="divEntrega" class="d-none">            
                    <h5 class="h5-responsive">
                        <i class="fa fa-caret-right fa-fw" aria-hidden="true"></i>
                        <strong> Entrega</strong>
                        <small class="text-muted">Enviamos o retiras?</small>
                    </h5>
                    <div class="col-12">
                        <!-- Inline radio -->
                        <label class="radio-inline pmd-radio">
                            <input type="radio" name="entrega" id="inlineRadio1" value="envio" checked>
                            <span for="inlineRadio1">Envio a domicilio</span> 
                        </label>
                        <label class="radio-inline pmd-radio ml-2">
                            <input type="radio" name="entrega" id="inlineRadio2" value="retiro">
                            <span for="inlineRadio2">Retitro en sucursal</span> 
                        </label>				
                    </div>
                    <div id="divEnvio" class="col-12 mt-3">
                        <div class="row">
                            <div class="col-4 mt-1">
                                <div class="md-form form-sm">
                                    <i class="fa fa-map-marker prefix"></i>
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
">
                                    <label for="direccion">Direccion</label>
                                </div>
                            </div>
                            <div class="col-4 mt-1">
                                <div class="md-form form-sm">
                                    <i class="fa fa-calendar prefix"></i>
                                    <input type="text" class="form-control" id="fecha_entrega" name="fecha_entrega">
                                    <label for="fecha_entrega">Fecha de Entrega</label>
                                </div>
                            </div>        
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label><strong>Rango de entrega:</strong></label>
                                entre las 
                                <span id="slider-padding-value-min">10:00</span> y
                                <span id="slider-padding-value-max">21:00</span>Hs
                                <input type="hidden" id="slider-input-min" name="slider-input-min">
                                <input type="hidden" id="slider-input-max" name="slider-input-max">
                                <div id="slider" class="mt-1 ml-3"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-5">
                                    <button class="btn btn-sm btn-amber">
                                        <i class="fa fa-save fa-fw"></i>&nbsp;Guardar
                                    </button>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div id="divRetiro" class="col-12 d-none mt-3">
                        <div class='table-responsive'>
                            <table class="table table-sm table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Descripción</th>
                                  <th class='border-right-0'>Dirección</th>
                                  <th class="text-right border-left-0"></th>
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
                                      <td class='border-right-0'><?php echo $_smarty_tpl->tpl_vars['s']->value->getDireccion();?>
</td>
                                      <td class="text-right border-left-0">
                                          <label class="radio-inline pmd-radio">
                                            <input type="radio" name="sucursal" value="<?php echo $_smarty_tpl->tpl_vars['s']->value->getIdSUC();?>
" data-direccion='<?php echo $_smarty_tpl->tpl_vars['s']->value->getDireccion();?>
' data-nombre="<?php echo $_smarty_tpl->tpl_vars['s']->value->getDescripcion();?>
">
                                          </label>
                                      </td>
                                    </tr>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                <?php } else { ?>
                                    <tr>
                                        <th scope="row" colspan="4"> * No se encontraron sucursales cargadas</th>
                                    </tr>
                                <?php }?>
                              </tbody>
                            </table>
                        </div>
                        <?php if (isset($_smarty_tpl->tpl_vars['sucursales']->value)) {?>
                            <div id="map" style="height: 300px"></div>
                            <div class="text-center mt-3">
                                <button class="btn btn-sm btn-amber">
                                    <i class="fa fa-save fa-fw"></i>&nbsp;Guardar
                                </button>
                            </div> 
                        <?php }?>
                    </div>
                </div>
            </form>
        </div>
    </div>               
<?php
}
}
/* {/block "section"} */
/* {block "jsadicional"} */
class Block_13895a442a63928c56_21533239 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Select2js -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/js/select2.full.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/select2/js/pmd-select2.js"><?php echo '</script'; ?>
>
<!-- Material Radio -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/form/js/radio.js"><?php echo '</script'; ?>
>
<!-- Datepicker -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/locales/bootstrap-datepicker.es.min.js"><?php echo '</script'; ?>
>
<!-- Slider -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/nouislider/js/nouislider.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_smarty_tpl->tpl_vars['GOOGLE_MAPS_API_KEY']->value;?>
"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

var map;

$(document).ready(function() {
    
    var snapSlider = document.getElementById('slider');
    noUiSlider.create(snapSlider, {
            start: [10, 21],
            margin: 1,
            step: 1,
            connect: true,
            range: {
                'min': 0,
                'max': 24
            }
    });
    
    var paddingMin = document.getElementById('slider-padding-value-min'),
	paddingMax = document.getElementById('slider-padding-value-max');
    var inputMin = document.getElementById('slider-input-min'),
        inputMax = document.getElementById('slider-input-max');

    snapSlider.noUiSlider.on('update', function ( values, handle ) {
        var h, i, j;
        if ( handle ) {
            h = paddingMax;
            i = inputMax;
            j = 1;
        } else {
            h = paddingMin;
            i = inputMin;
            j = 0;
        }
        
        var hora = values[j].replace(".", ":");
        h.innerHTML = hora;
        i.value = hora;
    });
    
    $('.selectCerveza, .selectProducto, .selectCantidad').select2({
        theme: "bootstrap"
    });
    
    $('#fecha_entrega').datepicker({
        language: 'es',
        clearBtn: true,
        autoclose: true,
        startDate: '<?php echo smarty_modifier_date_format(time(),"%d-1/%m/%Y");?>
',
        assumeNearbyYear: true
    });
    
    $("#btnAgregarLinea").click(function(){
        $cerveza = $("#cerveza option:selected");
        var cerveza_desc = $cerveza.text();
        var cerveza_id = $cerveza.val();
        var precio = $cerveza.data("precio");
        $producto = $("#producto option:selected");
        var producto_desc = $producto.text();
        var producto_id = $producto.val();
        var precio_producto = $producto.data("precio");
        var capacidad_producto = $producto.data("capacidad");
        var cantidad = $("#cantidad option:selected").val();
        var valor = getValorRecarga(precio, precio_producto, capacidad_producto, cantidad);
        
        if(cerveza_id > 0 && producto_id > 0 && cantidad > 0){
            $("#lineaPedido").append(
                    `<tr>
                        <td>`+cerveza_desc+`</td>
                        <td>`+producto_desc+`</td>
                        <td>`+cantidad+`</td>
                        <td class='border-right-0' name="precioLinea">$`+valor+`</td>
                        <td class='text-right border-left-0'>
                            <a name="btnBorrarLinea">
                                <i class='fa fa-minus-circle fa-lg fa-fw' aria-hidden='true'></i>
                            </a>
                        </td>
                        <input type="hidden" name="linea_cerveza[]" value="`+cerveza_id+`">
                        <input type="hidden" name="linea_producto[]" value="`+producto_id+`">
                        <input type="hidden" name="linea_cantidad[]" value="`+cantidad+`">
                    </tr>`);
            actualizarPrecio();
        }
    });
    
    function actualizarPrecio(){
        $lineas = $("td[name=precioLinea]");
        if($lineas.length){
            var total = 0;
            $lineas.each(function(i, obj) {
                total += parseFloat($(obj).text().substr(1));
            });
            $("#totalPedido").text("$"+total);
            
        } else {
            $("#totalPedido").text("Sin items");
        }
        mostrarSiHayLineas($("#divLineas"));
        mostrarSiHayLineas($("#divEntrega"));
    }
    
    function mostrarSiHayLineas($div){
        $lineas = $("td[name=precioLinea]");
        if($lineas.length){
            if($div.hasClass("d-none")){
                $div.removeClass("d-none");
                $div.addClass("animated fadeIn");
            }
        } else {
            if($div.hasClass("animated fadeIn")){
                $div.removeClass("animated fadeIn");
                $div.addClass("d-none");
            }
        }
    }
    
    $(document).on('click', 'a[name=btnBorrarLinea]', function(){
        $(this).closest("tr").remove();
        actualizarPrecio();
    });
    
    $('input[type=radio][name=entrega]').change(function() {
        if (this.value == 'envio') {
            if($("#divEnvio").hasClass("d-none")){
                $("#divEnvio").removeClass("d-none");
                $("#divEnvio").addClass("animated fadeIn");
            }
            $("#divRetiro").addClass("d-none");
        } else {
            if($("#divRetiro").hasClass("d-none")){
                $("#divRetiro").removeClass("d-none");
                $("#divRetiro").addClass("animated fadeIn");
            }
            $("#divEnvio").addClass("d-none");
        }
    });
    
    // Para que no se buguee al inicializar hidden
    $('#divRetiro').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', initMap);
    
});

function initMap() {
    $sucursales = $('input[type=radio][name=sucursal]');
    if($sucursales.length){
        // Solo inicializo si hay sucursales
        var mardel = new google.maps.LatLng( -38.0022800, -57.5575400 );
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: mardel
        });
    
        var geocoder = new google.maps.Geocoder();
        $sucursales.each(function(i, obj) { // voy a crear un marcador por cada sucursal pero antes tengo que obtener las coordenadas en base a la direccion
            var direccion = "Mar del plata, "+$(obj).data("direccion");
            geocoder.geocode( { 'address' : direccion, 'region' : 'AR' }, function( results, status ) {
                if( status == google.maps.GeocoderStatus.OK ) {
                    
                    // Centramos para que no quede choto
                    map.setCenter( results[0].geometry.location );
                    
                    // Agregar marker + center
                    var marker = new google.maps.Marker( {
                        map     : map,
                        position: results[0].geometry.location
                    });
                    
                    // Creamos ventanas con info
                    var infowindow = new google.maps.InfoWindow({
                        content: "<strong>"+$(obj).data("nombre")+"</strong><br>"+ $(obj).data("direccion")
                    });
                    if (infowindow){
                        // Si clickeamos en el marker, abrimos la info
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.open(map, this);
                        });

                        //Bindeo un cambio de localizacion al radio
                        $(obj).change(function() {
                            map.setCenter( results[0].geometry.location ); // Centramos a la sucursal seleccionada
                            map.setZoom(17);
                            infowindow.open(map, marker); // abrimos la infowindow
                        });
                    }
                }
            });
        });
    }
    
}

function getValorRecarga(precio_cerveza, factor_precio, capacidad, cantidad){
    return Math.round((precio_cerveza * factor_precio * capacidad * cantidad)* 10) / 10;
}

<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "jsadicional"} */
}
