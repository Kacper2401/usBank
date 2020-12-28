<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/transferPaneStyle.css  ">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>

<form class="pure-form" action="{$conf->action_url}sendTransfer" method="post">
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
        <a href="{$conf->action_url}sendTransfer" methods="post">
            <button class="button-secondary pure-button">Wykonaj przelew</button>
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