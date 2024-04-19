<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barre de navigation</title>
    <link rel="stylesheet" href="../../CSS/navbar.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <!-- <a href="index.php">Accueil</a> -->
            <a href="catalogue.php">Voir Formations</a>
            <a href="choixInscriptionSession.php">S'inscrire à une session</a>
            <a href="listeInscrit.php">Liste des sessions</a>
            <?php
                if (isset($_SESSION['ID_Participant'])) {
                    // Si l'utilisateur est connecté, affiche le bouton de déconnexion
                    echo '<span>' . htmlspecialchars($_SESSION['prenom']) . ' ' . htmlspecialchars($_SESSION['nom']) . '</span>';
                    echo '<a href="../CONTROLLEUR/deconnexion.php">Se déconnecter</a>';
                } else {
                    // Sinon, affiche le lien de connexion
                    echo '<a href="connexion.php">Connexion</a>';
                }
            ?>
        </div>
    </nav>
</body>
</html>