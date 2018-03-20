{if isset($pedidos)}
    {foreach $pedidos as $p}
    <tr>
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
      <td>
          {$p->getCliente()->getNombreApellido()}
      </td>
      <td>
          {if is_null($p->getSucursal())}
              Envio
          {else}
              Retiro
          {/if}
      </td>
      <td>{$util::timestampToDDMMYYYYHHIISS($p->getCreadoEn())}</td>
      <td>${$p->getValorTotal()}</td>
      <td>
          <select class="selectEstado pmd-select2 form-control" name="pedido" data-idPED="{$p->getIdPED()}">
               {assign 'solicitado' ''}
               {assign 'en_proceso' ''}
               {assign 'enviado' ''}
               {assign 'finalizado' ''}
               {if ($p->getEstado() == Models\Pedido::SOLICITADO)}
                   {assign 'solicitado' 'selected'}
               {elseif $p->getEstado() == Models\Pedido::EN_PROCESO}
                   {assign 'en_proceso' 'selected'}
               {elseif $p->getEstado() == Models\Pedido::ENVIADO}
                   {assign 'enviado' 'selected'}
               {else}
                   {assign 'finalizado' 'selected'}
               {/if}
               <option disabled="disabled" value="-1">Estado</option>
               <option value="{Models\Pedido::SOLICITADO}" {$solicitado}>Solicitado</option>
               <option value="{Models\Pedido::EN_PROCESO}" {$en_proceso}>En Proceso</option>
               <option value="{Models\Pedido::ENVIADO}" {$enviado}>Enviado</option>
               <option value="{Models\Pedido::FINALIZADO}" {$finalizado}>Finalizado</option>
           </select>
      </td>
    </tr>
    {/foreach}
    <tr name="filaNinguno" class="d-none">
        <th scope="row" colspan="7"> * No se encontraron pedidos</th>
    </tr>
{else}
    <tr name="filaNinguno">
        <th scope="row" colspan="7"> * No se encontraron pedidos</th>
    </tr>
{/if}