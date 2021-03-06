<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/closeStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<form class="pure-form"action="{$conf->action_url}close" method="post">
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
    <a href="{$conf->action_url}controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>

<div id="messages">{include file="messages.tpl"}</div>
{include file="footer.tpl"}

</body>
</html>