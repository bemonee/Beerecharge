<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:04
  from "C:\xampp\htdocs\Beerecharge\Views\Pedidos\Administradores\pedidos.items.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429b49f04a7_42574853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29e431ebe04e5abcfb3d404dcb89607a348d1de1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Pedidos\\Administradores\\pedidos.items.tpl',
      1 => 1511827352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a4429b49f04a7_42574853 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['pedidos']->value)) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pedidos']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
    <tr>
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
      <td>
          <?php echo $_smarty_tpl->tpl_vars['p']->value->getCliente()->getNombreApellido();?>

      </td>
      <td>
          <?php if (is_null($_smarty_tpl->tpl_vars['p']->value->getSucursal())) {?>
              Envio
          <?php } else { ?>
              Retiro
          <?php }?>
      </td>
      <td><?php $_prefixVariable1 = $_smarty_tpl->tpl_vars['util']->value;
echo $_prefixVariable1::timestampToDDMMYYYYHHIISS($_smarty_tpl->tpl_vars['p']->value->getCreadoEn());?>
</td>
      <td>$<?php echo $_smarty_tpl->tpl_vars['p']->value->getValorTotal();?>
</td>
      <td>
          <select class="selectEstado pmd-select2 form-control" name="pedido" data-idPED="<?php echo $_smarty_tpl->tpl_vars['p']->value->getIdPED();?>
">
               <?php $_smarty_tpl->_assignInScope('solicitado', '');
?>
               <?php $_smarty_tpl->_assignInScope('en_proceso', '');
?>
               <?php $_smarty_tpl->_assignInScope('enviado', '');
?>
               <?php $_smarty_tpl->_assignInScope('finalizado', '');
?>
               <?php if (($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::SOLICITADO)) {?>
                   <?php $_smarty_tpl->_assignInScope('solicitado', 'selected');
?>
               <?php } elseif ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::EN_PROCESO) {?>
                   <?php $_smarty_tpl->_assignInScope('en_proceso', 'selected');
?>
               <?php } elseif ($_smarty_tpl->tpl_vars['p']->value->getEstado() == Models\Pedido::ENVIADO) {?>
                   <?php $_smarty_tpl->_assignInScope('enviado', 'selected');
?>
               <?php } else { ?>
                   <?php $_smarty_tpl->_assignInScope('finalizado', 'selected');
?>
               <?php }?>
               <option disabled="disabled" value="-1">Estado</option>
               <option value="<?php echo Models\Pedido::SOLICITADO;?>
" <?php echo $_smarty_tpl->tpl_vars['solicitado']->value;?>
>Solicitado</option>
               <option value="<?php echo Models\Pedido::EN_PROCESO;?>
" <?php echo $_smarty_tpl->tpl_vars['en_proceso']->value;?>
>En Proceso</option>
               <option value="<?php echo Models\Pedido::ENVIADO;?>
" <?php echo $_smarty_tpl->tpl_vars['enviado']->value;?>
>Enviado</option>
               <option value="<?php echo Models\Pedido::FINALIZADO;?>
" <?php echo $_smarty_tpl->tpl_vars['finalizado']->value;?>
>Finalizado</option>
           </select>
      </td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <tr name="filaNinguno" class="d-none">
        <th scope="row" colspan="7"> * No se encontraron pedidos</th>
    </tr>
<?php } else { ?>
    <tr name="filaNinguno">
        <th scope="row" colspan="7"> * No se encontraron pedidos</th>
    </tr>
<?php }
}
}
