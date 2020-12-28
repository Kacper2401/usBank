<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 23:33:42
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\delete panel\deletePanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea5d46f0bf60_01511657',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4881e44af6a73b04ca13a85ad402c3a64b5ba83f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\delete panel\\deletePanel.tpl',
      1 => 1609194816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fea5d46f0bf60_01511657 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/closeStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
close" method="post">
    <fieldset>
            <label class="title">Formularz zamknięcia konta</label>
            <label class="user">
                Nazwa użytkownika: <input type="text" name="user"/>
            </label>
    </fieldset>
    <div id="usun">
        <button class="button-secondary pure-button usunButton">Zamknij konto</button>
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
