<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 23:19:05
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\transfer history\transferHistory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea59d9700920_76568632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '007675247c95d9cf438b77a85b3b20e9481129a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\transfer history\\transferHistory.tpl',
      1 => 1609193942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fea59d9700920_76568632 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/transferHistoryStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<div id="container">
    <h1>Przelewy wychodzące</h1>
    <table class="pure-table">
        <thead>
        <tr>
            <th>Do użytkownika</th>
            <th>Kwota</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opis</th>
        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recordsTo']->value, 'record');
$_smarty_tpl->tpl_vars['record']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['login'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['date'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['description'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<div id="container">
    <h1>Przelewy przychodzące</h1>
    <table class="pure-table">
        <thead>
        <tr>
            <th>Od użytkownika</th>
            <th>Kwota</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opis</th>
        </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recordsFrom']->value, 'record');
$_smarty_tpl->tpl_vars['record']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['record']->value) {
$_smarty_tpl->tpl_vars['record']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['login'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['value'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['date'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['record']->value['description'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
<div id="back">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>
</body>
</html><?php }
}
