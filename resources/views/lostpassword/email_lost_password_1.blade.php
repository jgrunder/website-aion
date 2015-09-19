<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <style>
        body {
            font-family: Sans-Serif;
            background-color: #fcf8f7;
            color: #555555;
        }
    </style>
</head>
<body>
    Bonjour <?php echo $account->name; ?>,
    <br> <br>
    Si vous avez fait une demande de mot de passe oublié sur le site de RealAion, merci de cliquer sur ce lien pour recevoir un nouveau mot de passe :
    <a href="<?php echo $link; ?>">ici</a>
</body>
</html>