{extends file='layout.tpl'}
{block name="title"}Pedidos{/block}
{block name="section_title"}<i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Mis Pedidos{/block}
{block name="section"}
    <div class="row">
        <div class="col-12">
            <div class="float-left">
                <div>
                    <h5>Listado de pedidos realizados</h5>
                </div>
            </div>
            <div class="float-right">
                <a href="{$p_dir}/clients/orders/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nuevo
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-elegant disabled">
                <input type="radio" checked autocomplete="off" disabled> Listar
              </label>
              <label class="btn btn-sm btn-elegant active">
                <input type="radio" autocomplete="off" name="filtro" value="todos"> Todos
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="{Models\Pedido::SOLICITADO}"> Solicitados
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="{Models\Pedido::EN_PROCESO}"> En proceso
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="{Models\Pedido::ENVIADO}"> Enviados
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="{Models\Pedido::FINALIZADO}"> Finalizados
              </label>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped mt-2" id="tablaPedidos">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Fecha Solicitud</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </tr>
              </thead>
              <tbody>
                {if isset($pedidos)}
                    {foreach $pedidos as $p}
                    <tr name="{$p->getEstado()}">
                      <th scope="row">{$p->getIdPED()}</th>
                      <td>
                          <ul class="list-unstyled">
                          {foreach $p->getRecargas() as $recarga}
                              {assign 'producto' $recarga->getProducto()}
                              {assign 'cerveza' $recarga->getTipoCerveza()}
                              <li>{$recarga->getCantidad()}x {$producto->getDescripcion()} ({$producto->getCapacitadLts()}lts.) de {$cerveza->getDescripcion()}</li>
                          {/foreach}    
                          </ul>
                      </td>
                      <td>{$util::timestampToDDMMYYYYHHIISS($p->getCreadoEn())}</td>
                      <td>${$p->getValorTotal()}</td>
                      <td>
                          {if $p->getEstado() == Models\Pedido::SOLICITADO}
                              Solicitado
                          {elseif $p->getEstado() == Models\Pedido::EN_PROCESO} 
                              En Proceso
                          {elseif $p->getEstado() == Models\Pedido::ENVIADO} 
                              Enviado
                          {else}
                              Finalizado
                          {/if}
                      </td>
                      <td class="text-right">
                          {if $p->getEstado() == Models\Pedido::SOLICITADO}
                            <a href="{$p_dir}/clients/orders/update/{$p->getIdPED()}/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                            <a href="{$p_dir}/clients/orders/delete/{$p->getIdPED()}/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                          {/if}
                      </td>
                    </tr>
                    {/foreach}
                    <tr name="filaNinguno" class="d-none">
                        <th scope="row" colspan="6"> * No se encontraron pedidos bajo esos parametros de busqueda</th>
                    </tr>
                {else}
                    <tr name="filaNinguno">
                        <th scope="row" colspan="6"> * No se encontraron pedidos realizados <a href="{$p_dir}/clients/orders/add/" class="orange-text">¿Desea agregar uno?</a></th>
                    </tr>
                {/if}
              </tbody>
            </table>
        </div>
    </div>
{/block}

{block name="jsadicional" append}
    <script>
        $(document).ready(function() {
            $('input[type=radio][name=filtro]').change(function() {
                var mostrar = $(this).val();
                if(mostrar === "todos"){
                    $("#tablaPedidos > tbody > tr").show();
                } else {
                    $("#tablaPedidos > tbody > tr[name!="+mostrar+"][name!=filaNinguno]").hide();
                    $filas = $("#tablaPedidos > tbody > tr[name="+mostrar+"][name!=filaNinguno]").show();
                    if($filas.length > 0){
                        $("tr[name=filaNinguno]").addClass("d-none");
                    } else {
                        $("tr[name=filaNinguno]").removeClass("d-none");
                    }
                }
            });
        });
    </script>
{/block}