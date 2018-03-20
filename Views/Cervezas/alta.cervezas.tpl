{extends file='layout.tpl'}
{block name="title"}Cervezas{/block}
{block name="section_title"}
    <div class="float-left">
        <i class="fa fa-beer fa-fw" aria-hidden="true"></i> Nueva Cerveza
    </div>
    <div class="float-right">
        <a href="{$p_dir}/cervezas/"><i class="fa fa-arrow-circle-o-left white-text fa-lg fa-fw" aria-hidden="true"></i></a>
    </div>
{/block}
{block name="section"}
    <div class="row">
        <div class="col-6">
            <form action="{$p_dir}/cervezas/add/" method="POST" enctype="multipart/form-data">
                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
                    <label for="descripcion">Descripción</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-percent prefix"></i>
                    <input type="number" step="0.01" min="0" max="99.99" id="abv" name="abv" class="form-control">
                    <label for="abv">ABV (##,##)</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-hashtag prefix"></i>
                    <input type="number" step="1" min="0" max="99" id="ibu" name="ibu" class="form-control">
                    <label for="ibu">IBU (##)</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-hashtag prefix"></i>
                    <input type="number" step="1" min="0" max="99" id="srm" name="srm" class="form-control">
                    <label for="srm">SRM (##)</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-money prefix"></i>
                    <input type="number" step="0.01" min="0" max="9999.99" id="precio_x_litro" name="precio_x_litro" class="form-control">
                    <label for="precio_x_litro">Precio por litro (##,##)</label>
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