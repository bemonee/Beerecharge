{extends file='layout.tpl'}
{block name="title"}Cervezas{/block}
{block name="section_title"}<i class="fa fa-beer fa-fw" aria-hidden="true"></i> Cervezas{/block}
{block name="section"}
    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Tipos de Cerveza</h5>
            </div>
            <div class="float-right">
                <a href="{$p_dir}/cervezas/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nueva
                </a>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center justify-content-lg-start">
    {if isset($cervezas)}
        {foreach $cervezas as $c}
        <div class="mx-2 mt-3">
            <!--Card-->
            <div class="card cerveza">
                <!--Card image-->
                <div class="view overlay hm-white-slight foto-cerveza hm-zoom">
                    <img src="{$p_dir}/{$c->getRutaImagen()}" class="img-fluid" alt="">
                    <div class="mask"></div>
                </div>
                <!--Card content-->
                <div class="card-body text-center">
                    <!--Title-->
                    <h4 class="card-title my-0">{$c->getDescripcion()}</h4>
                    <!--Text-->
                    <p class="card-text mt-0">
                        <strong>ABV</strong> %{$c->getAbv()}
                        <strong>IBU</strong> {$c->getIbu()} 
                        <strong>SRM</strong> {$c->getSrm()}
                        <br>
                        ${$c->getPrecioXLitro()} <strong>por litro</strong>
                    </p>
                    <div class="botones-cerveza">
                        <a href="{$p_dir}/cervezas/update/{$c->getIdTC()}/">
                            <i class="fa fa-pencil-square-o fa-lg fa-fw"></i>
                        </a>
                        <a href="{$p_dir}/cervezas/delete/{$c->getIdTC()}/">
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
            <p>* No se encontraron cervezas cargadas <a href="{$p_dir}/cervezas/add/" class="orange-text">¿Desea agregar una?</a></p>
        </div>
    {/if}
    </div>
{/block}