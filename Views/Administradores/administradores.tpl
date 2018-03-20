{extends file='layout.tpl'}
{block name="title"}Administradores{/block}
{block name="section_title"}<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i> Administradores{/block}
{block name="section"}
    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Administradores</h5>
            </div>
            <div class="float-right">
                <a href="{$p_dir}/admins/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nueva
                </a>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Fecha de Inicio</th>
                  <th class="text-right">Acciones</th>
                </tr>
              </thead>
              <tbody>
                {if isset($administradores)}
                    {foreach $administradores as $a}
                    <tr>
                      <th scope="row">{$a->getIdADM()}</th>
                      <td>{$a->getNombreApellido()}</td>
                      <td>{$a->getUsuario()}</td>
                      <td>{$a->getCreationDate()}</td>
                      <td class="text-right">
                          <a href="{$p_dir}/admins/update/{$a->getIdADM()}/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                          <a href="{$p_dir}/admins/delete/{$a->getIdADM()}/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    {/foreach}
                {else}
                    <tr>
                        <th scope="row" colspan="5"> * No se encontraron otros administradores cargados <a href="{$p_dir}/admins/add/" class="orange-text">¿Desea agregar uno?</a></th>
                    </tr>
                {/if}
              </tbody>
            </table>
        </div>
    </div>
{/block}