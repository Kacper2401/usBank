<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 21:34:10
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\transfer panel\transferPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea4142084ac3_34498399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c1fc9faf4437992d5aa73fada42002fb3c4ec29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\transfer panel\\transferPanel.tpl',
      1 => 1609110326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fea4142084ac3_34498399 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/transferPaneStyle.css  ">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>

<form class="pure-form" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
sendTransfer" method="post">
    <fieldset>
        <label class="titleForm">Formularz trasferu</label>
        <label class="toUser">
            Odbiorca: <i class="far fa-user"></i><input type="text" name="toUser" size="30"/>
        </label>
        <label class="value">
            Kwota: &nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-user"></i><input type="number" step="0.01" name="value" size="30"/>
        </label>
        <label class="title">
            Tytuł: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-user"></i><input type="text" name="title" size="30"/>
        </label>
        <label class="description">
            Opis: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-user"></i><textarea type="text" name="description" rows="4" cols="28"></textarea>
        </label>
    </fieldset>
    <div id="przelew">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
sendTransfer" methods="post">
            <button class="button-secondary pure-button">Wykonaj przelew</button>
        </a>
    </div>
</form>

<div id="back">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>

<div id="messages"><?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
