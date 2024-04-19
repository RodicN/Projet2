<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="../../CSS/connexion.css">
</head>
<body>
    <form action="../CONTROLLEUR/connexion.php" method="post">
        <h2>Connexion</h2>
        <label for="username">Email :</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
