<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:17:43
  from "C:\xampp\htdocs\Beerecharge\Views\Reportes\litros_entre_fechas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a17b806b3_33763980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a599b3fa939e2c46640a46f1e98fc0d1a3fa489' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Reportes\\litros_entre_fechas.tpl',
      1 => 1511837999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a442a17b806b3_33763980 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_134805a442a17b38235_91323794', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193935a442a17b44d89_72370003', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162305a442a17b52ec9_35845666', "cssadicional");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170635a442a17b5a616_65740572', "section");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_295245a442a17b7b450_59709824', "jsadicional");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_134805a442a17b38235_91323794 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Reportes<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_193935a442a17b44d89_72370003 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="float-left">
        <i class="fa fa-info fa-fw" aria-hidden="true"></i> Litros de cervezas solicitados entre fechas
    </div>
    <div class="float-right">
        <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/reports/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
<?php
}
}
/* {/block "section_title"} */
/* {block "cssadicional"} */
class Block_162305a442a17b52ec9_35845666 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/Assets/plugins/datepicker/css/bootstrap-datepicker.min.css">
<?php
}
}
/* {/block "cssadicional"} */
/* {block "section"} */
class Block_170635a442a17b5a616_65740572 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="md-form form-sm">
                <i class="fa fa-calendar prefix"></i>
                <input type="text" class="form-control" id="fecha_desde" name="fecha_desde">
                <label for="fecha_desde">Fecha Desde</label>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="md-form form-sm">
                <i class="fa fa-calendar prefix"></i>
                <input type="text" class="form-control" id="fecha_hasta" name="fecha_hasta">
                <label for="fecha_hasta">Fecha Hasta</label>
            </div>
        </div>
        <div class="col-1 mt-1 mr-auto">
            <a id="btnBuscar" class="btn btn-sm btn-amber px-2">
                <i class="fa fa-search fa-fw"></i>
            </a>
        </div>
    </div>
    <div class="row d-none" id="contenido">
        <div class="col-6">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="col-6">
            <table class="table table-sm table-responsive table-bordered">
              <thead>
                <tr>
                  <th>Cerveza</th>
                  <th>Litros solicitados</th>
                </tr>
              </thead>
              <tbody id="filaCervezas">
                
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
class Block_295245a442a17b7b450_59709824 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
        var chart;
        $(document).ready(function() {
            $('#fecha_desde, #fecha_hasta').datepicker({
                language: 'es',
                clearBtn: true,
                autoclose: true,
                assumeNearbyYear: true
            });
            
            filterData();
        });
        
        $("#btnBuscar").click(function(){
            filterData();
        });
        
        function filterData(){
            
            var fecha_desde = $("#fecha_desde").val().replace(/\//g, "-");
            if(!fecha_desde.length){
                fecha_desde = "0";
            }
            var fecha_hasta = $("#fecha_hasta").val().replace(/\//g, "-");
            if(!fecha_hasta.length){
                fecha_hasta = "0";
            }
            
            var url = "<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/reports/litros_entre_fechas/"+fecha_desde+"/"+fecha_hasta+"/";
            $.ajax({
                url: url,
                cache: false,
                beforeSend: function( ) {
                    $("#contenido").addClass('d-none');
                    $("#loading").removeClass('d-none');
                }
            })
            .done(function(data) {
                console.log(data);
                if(data.response.length){
                    drawChart(data.response);
                    drawTable(data.response);
                }
            })
            .fail(function() {
               alert("Parametros mal formados");
            })
            .always(function(data) {
                $("#loading").addClass('d-none');
                if(data.response.length){
                    $("#contenido").removeClass('d-none');
                }
            });
        }
        
        function drawChart(response){
            var cervezas = [];
            var lts = [];
            var colores = [];
            for(var i=0; i<response.length; i++){
                cervezas.push(response[i].cerveza);
                lts.push(response[i].lts);
                colores.push(getRandomColor());
            }
            
            if(chart !== undefined){
                chart.destroy();
            }
            var ctxP = document.getElementById("pieChart").getContext('2d');
            chart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: cervezas,
                    datasets: [
                        {
                            data: lts,
                            backgroundColor: colores
                        }
                    ]
                },
                options: {
                    responsive: true
                }    
            });
        }
        
        function drawTable(response){
            $("#filaCervezas").empty();
            for(var i=0; i<response.length; i++){
                $("#filaCervezas").append(`
                    <tr>
                        <td>`+response[i].cerveza+`</td>
                        <td>`+response[i].lts+` lts</td>
                    </tr>
                `);
            }
        }
        
        function getRandomColor() {
          var letters = '0123456789ABCDEF';
          var color = '#';
          for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
        }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "jsadicional"} */
}
