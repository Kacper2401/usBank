<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-27 17:27:00
  from 'C:\xampp\htdocs\bank\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe8b5d41da9c8_59614181',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b0be57baddb38508e530b9699b63571ad9016a1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\messages.tpl',
      1 => 1609086389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe8b5d41da9c8_59614181 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
    <ul>
        <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
    </ul>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
