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
    Votre nouveau mot de passe : <?php echo $password; ?>
</body>
</html>