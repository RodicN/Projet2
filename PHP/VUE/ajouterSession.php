<?php
    session_start();

    if(!$_SESSION['ID_Participant']){
        header('Location: connexion.php');
        exit;
    }


    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include '../MODELE/bd.formation.inc.php';

    // Récupération des formations pour affichage
    $formations = getFormation();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Session de Formation</title>
    <link rel="stylesheet" href="../../CSS/ajouterSession.css">
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

    <h1>Ajouter une nouvelle session de formation</h1>

    <form action="../CONTROLLEUR/ajouterSession.php" method="POST">
        <label for="formation">Formation:</label>
        <select id="formation" name="id_formation" required>
            <option value="" disabled selected>Choisir une formation</option>
            <?php foreach ($formations as $row): ?>
                <option value="<?= htmlspecialchars($row["ID_Formation"]) ?>"><?= htmlspecialchars($row["Nom"]) ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="horaire">Horaire:</label>
        <input type="time" id="horaireD" name="horaireD" required>
        <input type="time" id="horaireF" name="horaireF" required><br>

        <label for="lieu">Lieu:</label>
        <input type="text" id="lieu" name="lieu" required><br>

        <label for="public">Public Cible:</label>
        <textarea id="public" name="public" required></textarea><br>

        <label for="intervenant">Intervenant:</label>
        <input type="text" id="intervenant" name="intervenant" required><br>

        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu" required></textarea><br>

        <label for="dateLimiteInscription">Date Limite d'Inscription:</label>
        <input type="date" id="dateLimiteInscription" name="dateLimiteInscription" required><br>

        <input type="submit" value="Ajouter Session">
    </form>
</body>
</html>
