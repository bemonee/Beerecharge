{extends file='layout.tpl'}
{block name="title"}Reportes{/block}
{block name="section_title"}<i class="fa fa-info fa-fw" aria-hidden="true"></i> Reportes{/block}
{block name="section"}
    <div class="row">
        <div class="col-12">
            <div class="float-left">
                <div>
                    <h5>Listado de reportes</h5>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="list-group">
              <a href="{$p_dir}/reports/litros_entre_fechas/" class="list-group-item">
                <i class="fa fa-hand-o-right fa-fw" aria-hidden="true"></i>
                Litros de cervezas solicitados entre fechas
              </a>
            </div>
        </div>
    </div>
{/block}
