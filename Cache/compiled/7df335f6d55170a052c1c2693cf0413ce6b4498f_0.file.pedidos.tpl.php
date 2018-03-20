<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:04
  from "C:\xampp\htdocs\Beerecharge\Views\Pedidos\Administradores\pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429b442ac14_50600445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7df335f6d55170a052c1c2693cf0413ce6b4498f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Pedidos\\Administradores\\pedidos.tpl',
      1 => 1511918452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:Views/Pedidos/Administradores/pedidos.items.tpl' => 1,
  ),
),false)) {
function content_5a4429b442ac14_50600445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_262075a4429b42201c3_05126712', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145085a4429b4226568_46639296', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_147095a4429b42b8be6_04888552', "cssadicional");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197225a4429b4407ff4_65337568', "section");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_24275a4429b4426e16_77080455', "jsadicional");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_262075a4429b42201c3_05126712 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Pedidos<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_145085a4429b4226568_46639296 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Pedidos Realizados<?php
}
}
/* {/block "section_title"} */
/* {block "cssadicional"} */
class Block_147095a4429b42b8be6_04888552 extends Smarty_Internal_Block
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
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/css/bootstrap-datepicker.min.css">
<?php
}
}
/* {/block "cssadicional"} */
/* {block "section"} */
class Block_197225a4429b4407ff4_65337568 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
                <?php if (isset($_smarty_tpl->tpl_vars['clientes']->value)) {?>
                    <select class="selectCliente pmd-select2 form-control" id="cliente" name="cliente">
                        <option value="0" selected>Cliente</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdCLIENTE();?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->getNombreApellido();?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                <?php } else { ?>
                    <select class="selectCliente pmd-select2 form-control" id="cliente" name="cliente">
                        <option value="0" selected>Cliente</option>
                    </select>
                <?php }?>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mt-2 mr-auto">
            <div class="md-form form-sm">
                <?php if (isset($_smarty_tpl->tpl_vars['sucursales']->value)) {?>
                    <select class="selectSucursal pmd-select2 form-control" id="sucursal" name="sucursal">
                        <option value="0" selected>Sucursal</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sucursales']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value->getIdSUC();?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value->getDescripcion();?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </select>
                <?php } else { ?>
                    <select class="selectSucursal pmd-select2 form-control" id="sucursal" name="sucursal">
                        <option value="0" selected>Sucursal</option>
                    </select>
                <?php }?>
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
                <?php $_smarty_tpl->_subTemplateRender("file:Views/Pedidos/Administradores/pedidos.items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
<?php
}
}
/* {/block "section"} */
/* {block "jsadicional"} */
class Block_24275a4429b4426e16_77080455 extends Smarty_Internal_Block
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
    <!-- Datepicker -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/locales/bootstrap-datepicker.es.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
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
            var url = "<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/orders/getPedidosByFilters/"+fecha+"/"+$("#cliente").val()+"/"+$("#sucursal").val()+"/";
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
                    url: "<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/orders/update/"+$(this).data("idped")+"/",
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
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "jsadicional"} */
}
