<!DOCTYPE html>
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
        <form action="{$conf->action_url}login" method="post">
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

{include file='messages.tpl'}

{include file="footer.tpl"}

</body>
</html>