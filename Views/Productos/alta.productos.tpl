{extends file='layout.tpl'}
{block name="title"}Productos{/block}
{block name="section_title"}
    <div class="float-left">
        <i class="fa fa-product-hunt fa-fw" aria-hidden="true"></i> Nuevo Producto
    </div>
    <div class="float-right">
        <a href="{$p_dir}/productos/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
{/block}
{block name="section"}
    <div class="row">
        <div class="col-6">
            <form action="{$p_dir}/productos/add/" method="POST" enctype="multipart/form-data">
                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
                    <label for="descripcion">Descripción</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-percent prefix"></i>
                    <input type="number" step="0.01" min="0" id="capacidad_lts" name="capacidad_lts" class="form-control">
                    <label for="capacidad_lts">Capacidad en Lts (##,##)</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-money prefix"></i>
                    <input type="number" step="0.01" min="0" max="1" id="factor_precio" name="factor_precio" class="form-control">
                    <label for="factor_precio">Factor Precio (##,##)</label>
                </div>
                <p class="lead"><i class="fa fa-caret-right fa-fw" aria-hidden="true"></i> Foto</p>
                <div class="md-form ml-4">
                    <input type="file" class="form-control-file" id="foto" name="foto">
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