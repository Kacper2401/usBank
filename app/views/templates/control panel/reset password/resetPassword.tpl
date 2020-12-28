<!DOCTYPE html>
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
<form class="pure-form"action="{$conf->action_url}resetPassword" method="post">
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
        <a href="{$conf->action_url}resetPassword" methods="post">
            <button class="button-secondary pure-button">Zmień hasło</button>
        </a>
    </div>
</form>
<div id="back">
    <a href="{$conf->action_url}controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>

<div id="messages">{include file="messages.tpl"}</div>
{include file="footer.tpl"}

</body>
</html>