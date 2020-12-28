<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 22:26:34
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\change password\changePassword.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea4d8abaac73_33335234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2a9aa23b877e85c17a7432aff35bdc5e5ec712f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\change password\\changePassword.tpl',
      1 => 1609190784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fea4d8abaac73_33335234 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/changePasswordStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changePassword" method="post">
    <fieldset>
            <label class="title">Formularz zmiany hasła konta</label>
            <label class="user">
                Nazwa użytkownika: <input type="text" name="user"/>
            </label>
            <label class="newPassword">
                Nowe hasło: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="newPassword"/>
            </label>
    </fieldset>
    <div id="zmien">
        <button class="button-secondary pure-button usunButton">Zmień hasło</button>
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
