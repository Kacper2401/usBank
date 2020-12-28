<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MING</title>
    <link rel="stylesheet" href="/bank/app/views/templates/style/transferHistoryStyle.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css"
          integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
</head>
<body>
<div id="container">
    <h1>Przelewy wychodzące</h1>
    <table class="pure-table">
        <thead>
        <tr>
            <th>Do użytkownika</th>
            <th>Kwota</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opis</th>
        </tr>
        </thead>
        {foreach $recordsTo as $record}
            <tr>
                <td>{$record['login']}</td>
                <td>{$record['value']}</td>
                <td>{$record['title']}</td>
                <td>{$record['date']}</td>
                <td>{$record['description']}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>
<div id="container">
    <h1>Przelewy przychodzące</h1>
    <table class="pure-table">
        <thead>
        <tr>
            <th>Od użytkownika</th>
            <th>Kwota</th>
            <th>Tytuł</th>
            <th>Data</th>
            <th>Opis</th>
        </tr>
        </thead>
        {foreach $recordsFrom as $record}
            <tr>
                <td>{$record['login']}</td>
                <td>{$record['value']}</td>
                <td>{$record['title']}</td>
                <td>{$record['date']}</td>
                <td>{$record['description']}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>
<div id="back">
    <a href="{$conf->action_url}controlPanelShow">
        <button class="button-secondary pure-button back-przycisk">Powrót</button>
    </a>
</div>
</body>
</html>