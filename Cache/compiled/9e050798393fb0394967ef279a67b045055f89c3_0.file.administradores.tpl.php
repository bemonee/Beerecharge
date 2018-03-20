<?php
/* Smarty version 3.1.30, created on 2017-12-28 00:16:29
  from "C:\xampp\htdocs\Beerecharge\Views\Administradores\administradores.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a4429cdbacfd3_16614125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e050798393fb0394967ef279a67b045055f89c3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Beerecharge\\Views\\Administradores\\administradores.tpl',
      1 => 1509667912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5a4429cdbacfd3_16614125 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_97535a4429cdb64e17_28761519', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17585a4429cdb6b0b7_24724998', "section_title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165755a4429cdba9623_50088022', "section");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "title"} */
class Block_97535a4429cdb64e17_28761519 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Administradores<?php
}
}
/* {/block "title"} */
/* {block "section_title"} */
class Block_17585a4429cdb6b0b7_24724998 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i> Administradores<?php
}
}
/* {/block "section_title"} */
/* {block "section"} */
class Block_165755a4429cdba9623_50088022 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-12 text-right">
            <div class="float-left">
                <h5>Gestión de Administradores</h5>
            </div>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/add/" class="btn btn-sm btn-amber">
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
                <?php if (isset($_smarty_tpl->tpl_vars['administradores']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['administradores']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?>
                    <tr>
                      <th scope="row"><?php echo $_smarty_tpl->tpl_vars['a']->value->getIdADM();?>
</th>
                      <td><?php echo $_smarty_tpl->tpl_vars['a']->value->getNombreApellido();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['a']->value->getUsuario();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['a']->value->getCreationDate();?>
</td>
                      <td class="text-right">
                          <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/update/<?php echo $_smarty_tpl->tpl_vars['a']->value->getIdADM();?>
/"><i class="fa fa-pencil-square-o fa-lg fa-fw" aria-hidden="true"></i></a>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/delete/<?php echo $_smarty_tpl->tpl_vars['a']->value->getIdADM();?>
/"><i class="fa fa-minus-circle fa-lg fa-fw" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <?php } else { ?>
                    <tr>
                        <th scope="row" colspan="5"> * No se encontraron otros administradores cargados <a href="<?php echo $_smarty_tpl->tpl_vars['p_dir']->value;?>
/admins/add/" class="orange-text">¿Desea agregar uno?</a></th>
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
}
