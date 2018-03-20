{extends file='layout.tpl'}
{block name="title"}Productos{/block}
{block name="section_title"}<i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i> Productos{/block}
{block name="section"}
    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Productos</h5>
            </div>
            <div class="float-right">
                <a href="{$p_dir}/productos/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center justify-content-lg-start">
    {if isset($productos)}
        {foreach $productos as $p}
        <div class="mx-2 mt-3">
            <!--Card-->
            <div class="card cerveza">
                <!--Card image-->
                <div class="view overlay hm-white-slight foto-cerveza hm-zoom">
                    <img src="{$p_dir}/{$p->getRutaImagen()}" class="img-fluid" alt="">
                    <div class="mask"></div>
                </div>
                <!--Card content-->
                <div class="card-body text-center">
                    <!--Title-->
                    <h4 class="card-title my-0">{$p->getDescripcion()}</h4>
                    <!--Text-->
                    <p class="card-text mt-0">
                        <strong>Capacidad:</strong> {$p->getCapacitadLts()} Lts.
                        <br>
                        {math equation="(1-factor_precio)*100" factor_precio=$p->getFactorPrecio()}%
                        <strong>Dto. por capacidad.</strong>
                    </p>
                    <div class="botones-cerveza">
                        <a href="{$p_dir}/productos/update/{$p->getIdPROD()}/">
                            <i class="fa fa-pencil-square-o fa-lg fa-fw"></i>
                        </a>
                        <a href="{$p_dir}/productos/delete/{$p->getIdPROD()}/">
                            <i class="fa fa-minus-circle fa-lg fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.Card-->
        </div>
        {/foreach}
    {else}
        <div class="col">
            <p>* No se encontraron productos cargados <a href="{$p_dir}/productos/add/" class="orange-text">¿Desea agregar uno?</a></p>
        </div>
    {/if}
    </div>
{/block}