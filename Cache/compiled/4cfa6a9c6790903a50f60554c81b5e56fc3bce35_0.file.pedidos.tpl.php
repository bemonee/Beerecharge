<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:18:36
  from "C:\xampp\htdocs\Beerecharge\Views\Pedidos\Clientes\pedidos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a442a4c4bc633_79326452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cfa6a9c6790903a50f60554c81b5e56fc3bce35' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Pedidos\\Clientes\\pedidos.tpl',
      1 => 1511828660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a442a4c4bc633_79326452 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_227645a442a4c3f2ed8_21610339', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_298775a442a4c3fc9f4_33717068', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18665a442a4c4a71d2_83020134', "section");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_222035a442a4c4b9a21_10796306', "jsadicional");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_227645a442a4c3f2ed8_21610339 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Pedidos<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_298775a442a4c3fc9f4_33717068 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i> Mis Pedidos<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_18665a442a4c4a71d2_83020134 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12">
            <div class="float-left">
                <div>
                    <h5>Listado de pedidos realizados</h5>
                </div>
            </div>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/add/" class="btn btn-sm btn-amber">
                    <i class="fa fa-plus-circle fa-fw"></i>&nbsp;Nuevo
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-sm btn-elegant disabled">
                <input type="radio" checked autocomplete="off" disabled> Listar
              </label>
              <label class="btn btn-sm btn-elegant active">
                <input type="radio" autocomplete="off" name="filtro" value="todos"> Todos
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="<?php echo Models\Pedido::SOLICITADO;?>
"> Solicitados
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="<?php echo Models\Pedido::EN_PROCESO;?>
"> En proceso
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="<?php echo Models\Pedido::ENVIADO;?>
"> Enviados
              </label>
              <label class="btn btn-sm btn-elegant">
                <input type="radio" autocomplete="off" name="filtro" value="<?php echo Models\Pedido::FINALIZADO;?>
"> Finalizados
              </label>
            </div>
        </div>
        <div class="col-12">
            <table class="table table-sm table-responsive table-striped mt-2" id="tablaPedidos">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Fecha Solicitud</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <th class="text-right">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($_smarty_tpl->tpl_vars['pedidos']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pedidos']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
                    <tr name="<?php echo $_smarty_tpl->tpl_vars['p']->value->getEstado();?>
">
                      <th scope="row"><?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPED();?>
</th>
                      <td>
                          <ul class="list-unstyled">
                          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value->getRecargas(), 'recarga');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['recarga']->value) {
?>
                              <?php $_smarty_tpl->_assignInScope('producto', $_smarty_tpl->tpl_vars['recarga']->value->getProducto());
?>
                              <?php $_smarty_tpl->_assignInScope('cerveza', $_smarty_tpl->tpl_vars['recarga']->value->getTipoCerveza());
?>
                              <li><?php echo $_smarty_tpl->tpl_vars['recarga']->value->getCantidad();?>
x <?php echo $_smarty_tpl->tpl_vars['producto']->value->getDescripcion();?>
 (<?php echo $_smarty_tpl->tpl_vars['producto']->value->getCapacitadLts();?>
lts.) de <?php echo $_smarty_tpl->tpl_vars['cerveza']->value->getDescripcion();?>
</li>
                          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
    
                          </ul>
                      </td>
                      <td><?php $_prefixVariable1 = $_smarty_tpl->tpl_vars['util']->value;
echo $_prefixVariable1::timestampToDDMMYYYYHHIISS($_smarty_tpl->tpl_vars['p']->value->getCreadoEn());?>
</td>
                      <td>$<?php echo $_smarty_tpl->tpl_vars['p']->value->getValorTotal();?>
</td>
                      <td>
                          <?php if ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::SOLICITADO) {?>
                              Solicitado
                          <?php } elseif ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::EN_PROCESO) {?> 
                              En Proceso
                          <?php } elseif ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::ENVIADO) {?> 
                              Enviado
                          <?php } else { ?>
                              Finalizado
                          <?php }?>
                      </td>
                      <td class="text-right">
                          <?php if ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::SOLICITADO) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/update/<?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPED();?>
/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/delete/<?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPED();?>
/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                          <?php }?>
                      </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <tr name="filaNinguno" class="d-none">
                        <th scope="row" colspan="6"> * No se encontraron pedidos bajo esos parametros de busqueda</th>
                    </tr>
                <?php } else { ?>
                    <tr name="filaNinguno">
                        <th scope="row" colspan="6"> * No se encontraron pedidos realizados <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/clients/orders/add/" class="orange-text">¿Desea agregar uno?</a></th>
                    </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
    </div>
<?php
}
}
/* {/block "section"} */
/* {block "jsadicional"} */
class Block_222035a442a4c4b9a21_10796306 extends Smarty_Internal_Block
{
public $append = true;
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(document).ready(function() {
            $('input[type=radio][name=filtro]').change(function() {
                var mostrar = $(this).val();
                if(mostrar === "todos"){
                    $("#tablaPedidos > tbody > tr").show();
                } else {
                    $("#tablaPedidos > tbody > tr[name!="+mostrar+"][name!=filaNinguno]").hide();
                    $filas = $("#tablaPedidos > tbody > tr[name="+mostrar+"][name!=filaNinguno]").show();
                    if($filas.length > 0){
                        $("tr[name=filaNinguno]").addClass("d-none");
                    } else {
                        $("tr[name=filaNinguno]").removeClass("d-none");
                    }
                }
            });
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "jsadicional"} */
}
