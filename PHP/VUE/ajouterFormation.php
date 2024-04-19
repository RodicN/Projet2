<?php
    session_start();

    if(!$_SESSION['ID_Participant']){
        header('Location: connexion.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Formation</title>
    <link rel="stylesheet" href="../../CSS/ajouterFormation.css">
</head>
<body>
    <?php
        if (isset($_SESSION['statut'])) {
            if ($_SESSION['statut'] == 'Salarié') {
                include('navbar.php');  // navbar pour les salariés
            } else if ($_SESSION['statut'] == 'Bénévole') {
                include('navbarU.php');  // navbar pour les bénévoles
            }
        } else {
            include('navbarU.php');
        }
    ?>

    <h1>Ajouter une nouvelle formation</h1>

    <form action="../CONTROLLEUR/ajouterFormation.php" method="POST">
        <label for="nom">Nom de la formation:</label><br>
        <input type="text" id="nom" name="nom" required><br>

        <label for="domaine">Domaine:</label><br>
        <input type="text" id="domaine" name="domaine" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>

        <label for="cout">Coût (€):</label><br>
        <input type="number" id="cout" name="cout" min="0" step="0.01" required><br>

        <input type="submit" value="Ajouter Formation">
    </form>
</body>
</html>
