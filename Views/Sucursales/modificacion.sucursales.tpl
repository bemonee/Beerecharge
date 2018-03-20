{extends file='layout.tpl'}
{block name="title"}Sucursales{/block}
{block name="section_title"}
    <div class="float-left">
        <i class="fa fa-building-o fa-fw" aria-hidden="true"></i> Modificación de sucursal
    </div>
    <div class="float-right">
        <a href="{$p_dir}/sucursales/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
{/block}
{block name="section"}
    <div class="row">
        <div class="col-6">
            <form action="{$p_dir}/sucursales/update/{$id}/" method="POST">
                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{$descripcion}">
                    <label for="descripcion">Descripción</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-globe prefix"></i>
                    <input type="text" id="direccion" name="direccion" class="form-control" value="{$direccion}">
                    <label for="direccion">Dirección</label>
                </div>
                <div class="text-center">
                    <button class="btn btn-sm btn-amber">
                        <i class="fa fa-save fa-fw"></i>&nbsp;Guardar
                    </button>
                </div>  
            </form>
        </div>
        <div class="col-6 border border-light border-top-0 border-right-0 border-bottom-0">
            
        </div>
    </div>
{/block}