<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-28 21:24:46
  from 'C:\xampp\htdocs\bank\app\views\templates\control panel\controlPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fea3f0e269d72_94908932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '926d169e6d6d471b82082a1f7eb0a104cd5f4b4c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\control panel\\controlPanel.tpl',
      1 => 1609187082,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fea3f0e269d72_94908932 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/controlPanelStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<label class="user">
    <?php echo $_SESSION['role'];?>
: <b><?php echo $_SESSION['login'];?>
</b>
</label>
<?php if (\core\RoleUtils::inRole("uzytkownik")) {?>
    <label class="saldo">
        Saldo konta: <?php echo $_SESSION['saldo'];?>
 zł
    </label>
<?php }?>

<?php if (\core\RoleUtils::inRole("uzytkownik")) {?>
    <div id="menu">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transferPanelShow"><button class="button-secondary pure-button" id="wykonaj">Wykonaj transakcje</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
transferHistoryShow"><button class="button-secondary pure-button">Historia transakcji</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
resetPasswordShow"><button class="button-secondary pure-button">Zmień hasło</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"><button class="button-secondary pure-button">Wyloguj</button></a>
    </div>
<?php }?>


<?php if (\core\RoleUtils::inRole("pracownik")) {?>
    <div id="menu">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addUserShow"><button class="button-secondary pure-button">Dodaj konto</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
closeShow"><button class="button-secondary pure-button">Zamknij konto</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
changePasswordShow"><button class="button-secondary pure-button">Zmień hasło</button></a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"><button class="button-secondary pure-button">Wyloguj</button></a>
    </div>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
