<!DOCTYPE html>
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
    {$smarty.session.role}: <b>{$smarty.session.login}</b>
</label>
{if \core\RoleUtils::inRole("uzytkownik")}
    <label class="saldo">
        Saldo konta: {$smarty.session.saldo} zł
    </label>
{/if}

{if \core\RoleUtils::inRole("uzytkownik")}
    <div id="menu">
        <a href="{$conf->action_url}transferPanelShow"><button class="button-secondary pure-button" id="wykonaj">Wykonaj transakcje</button></a>
        <a href="{$conf->action_url}transferHistoryShow"><button class="button-secondary pure-button">Historia transakcji</button></a>
        <a href="{$conf->action_url}resetPasswordShow"><button class="button-secondary pure-button">Zmień hasło</button></a>
        <a href="{$conf->action_url}logout"><button class="button-secondary pure-button">Wyloguj</button></a>
    </div>
{/if}


{if \core\RoleUtils::inRole("pracownik")}
    <div id="menu">
        <a href="{$conf->action_url}addUserShow"><button class="button-secondary pure-button">Dodaj konto</button></a>
        <a href="{$conf->action_url}closeShow"><button class="button-secondary pure-button">Zamknij konto</button></a>
        <a href="{$conf->action_url}changePasswordShow"><button class="button-secondary pure-button">Zmień hasło</button></a>
        <a href="{$conf->action_url}logout"><button class="button-secondary pure-button">Wyloguj</button></a>
    </div>
{/if}

{include file="footer.tpl"}
</body>
</html>