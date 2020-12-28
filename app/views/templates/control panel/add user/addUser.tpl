<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/addUserStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="{$conf->action_url}addUser" method="post">
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
    <a href="{$conf->action_url}controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>

<div id="messages">{include file="messages.tpl"}</div>
{include file="footer.tpl"}

</body>
</html>