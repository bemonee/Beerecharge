{extends file='layout.tpl'}
{block name="title"}Home{/block}
{block name="section_title"}<i class="fa fa-home fa-fw" aria-hidden="true"></i> Home{/block}
{block name="section"}
    <h4 class="h4-responsive mb-2">¡Hola {$nombre}!</h4>
    <hr>
    <div class="row">
        {if isset($primera_vez)}
            <div class="col-4">
                <p>
                    Pareciera que eres nuevo por aqui.<br>
                    Nos gustaria conocer tu verdadero nombre, tus datos serán de utilidad a la hora de realizar pedidos
                </p>
                <a class="btn btn-sm btn-amber" href="{$p_dir}/clients/config/">
                    <i class="fa fa-cog fa-fw"></i>&nbsp;Mis datos
                </a>
            </div> 
        {/if}

        {if isset($no_hay_pedidos)}
            <div class="col-4">
                <p>
                    ¿Nunca has probado nuestra cerveza?.<br>
                    Es el momento de descubrir tu nueva favorita.
                </p>
                <a class="btn btn-sm btn-amber" href="{$p_dir}/clients/orders/">
                    <i class="fa fa-cart-plus fa-fw"></i>&nbsp;Realizar Pedido
                </a>
            </div> 
        {else}
            <div class="col-4">
                <p class="mb-1">
                    Hoy es un buen día para una <strong>{$birra_preferida->getDescripcion()}</strong>.<br>
                    ¿Apeteces una?
                </p>
                <a class="btn btn-sm btn-amber" href="{$p_dir}/clients/orders/">
                    <i class="fa fa-smile-o fa-fw"></i>&nbsp;Si!
                </a>
            </div>
        {/if}
        
    </div>
    
{/block}