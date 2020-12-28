<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-27 19:38:18
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\reset password\resetPassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe8d49ae8b0c9_08415977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72800f113b9ae928668c8a476b4160e49e4c16a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\reset password\\resetPassword.tpl',
      1 => 1609094288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fe8d49ae8b0c9_08415977 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/resetPasswordStyle.css">
    <link href="/bank/lib/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPassword" method="post">
    <fieldset>
            <label class="title">Formularz zmiany hasła</label>
            <label class="oldPassword">
                Stare hasło: <i class="far fa-user"></i><input type="password" name="oldPassword"/>
            </label>
            <label class="newPassword">
                Nowe hasło: <i class="far fa-user"></i><input type="password" name="newPassword"/>
            </label>
    </fieldset>
    <div id="zmiana">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPassword" methods="post">
            <button class="button-secondary pure-button">Zmień hasło</button>
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
