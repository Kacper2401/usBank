<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 22:38:44
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\add user\addUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea50647a1b18_10864495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee25c9bf9369d603173f2c5084be2420ecd8d096' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\add user\\addUser.tpl',
      1 => 1609191523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fea50647a1b18_10864495 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/addUserStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addUser" method="post">
    <fieldset>
            <label class="title">Formularz dodania użytkownika</label>
            <label class="user">
                Login: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="user"/>
            </label>
            <label class="newPassword">
                Password: <input type="text" name="password"/>
            </label>
    </fieldset>
    <div id="dodaj">
        <button class="button-secondary pure-button usunButton">Dodaj konto</button>
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
