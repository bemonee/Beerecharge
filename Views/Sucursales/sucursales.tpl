{extends file='layout.tpl'}
{block name="title"}Sucursales{/block}
{block name="section_title"}<i class="fa fa-building-o fa-fw" aria-hidden="true"></i> Sucursales{/block}
{block name="section"}
    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de sucursales</h5>
            </div>
            <div class="float-right">
                <a href="{$p_dir}/sucursales/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nueva
                </a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Descripción</th>
                  <th>Dirección</th>
                  <th class="text-right">Acciones</th>
                </tr>
              </thead>
              <tbody>
                {if isset($sucursales)}
                    {foreach $sucursales as $s}
                    <tr>
                      <th scope="row">{$s->getIdSUC()}</th>
                      <td>{$s->getDescripcion()}</td>
                      <td>{$s->getDireccion()}</td>
                      <td class="text-right">
                          <a href="{$p_dir}/sucursales/update/{$s->getIdSUC()}/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                          <a href="{$p_dir}/sucursales/delete/{$s->getIdSUC()}/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    {/foreach}
                {else}
                    <tr>
                        <th scope="row" colspan="4"> * No se encontraron sucursales cargadas <a href="{$p_dir}/sucursales/add/" class="orange-text">¿Desea agregar una?</a></th>
                    </tr>
                {/if}
              </tbody>
            </table>
        </div>
    </div>
{/block}