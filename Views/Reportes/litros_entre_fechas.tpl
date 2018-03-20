{extends file='layout.tpl'}
{block name="title"}Reportes{/block}
{block name="section_title"}
    <div class="float-left">
        <i class="fa fa-info fa-fw" aria-hidden="true"></i> Litros de cervezas solicitados entre fechas
    </div>
    <div class="float-right">
        <a href="{$p_dir}/reports/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
{/block}
{block name="cssadicional" append}
    <!-- Datepicker -->
    <link rel="stylesheet" href="{$p_dir}/Assets/plugins/datepicker/css/bootstrap-datepicker.min.css">
{/block}
{block name="section"}
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
{/block}
{block name="jsadicional" append}
    <!-- Datepicker -->
    <script src="{$p_dir}/Assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{$p_dir}/Assets/plugins/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
    <script>
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
            
            var url = "{$p_dir}/reports/litros_entre_fechas/"+fecha_desde+"/"+fecha_hasta+"/";
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
    </script>
{/block}
