<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-27 12:24:02
  from 'C:\xampp\htdocs\bank\app\views\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe86ed2ba7f31_63706577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4505efa22d6ee7b14b4d84e5bb89bb66958b6b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bank\\app\\views\\templates\\login.tpl',
      1 => 1609068240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5fe86ed2ba7f31_63706577 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/loginStyle.css">
</head>
<body>
<h2>MING Bank</h2>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
            <h1>Zaloguj się</h1>
            <span>Przy pomocy założonego konta</span>
            <label>
                <input type="login" name="login" placeholder="Login"/>
            </label>
            <label>
                <input type="password" name="password" placeholder="Hasło"/>
            </label>
            <button>Zaloguj się</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-right">
                <h1>Witaj użytkowniku!</h1>
                <p>Witamy w banku MING. Aby skorzystać z naszych usług zaloguj się lub załóż konto poprzez kontakt z naszym pracownikiem.</p>
                Telefon kontaktowy 666-666-666.
                <br />
                Linia czynna całodobowo.
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
