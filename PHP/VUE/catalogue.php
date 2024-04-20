<?php
    session_start();

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
    <title>Catalogue des Formations</title>
    <link rel="stylesheet" href="../../CSS/catalogue.css">
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
    <h1>Catalogue des Formations</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Domaine</th>
                <th>Description</th>
                <th>Coût (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                if (count($formations) > 0) {
                    foreach ($formations as $row) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row["Nom"]) . "</td>
                            <td>" . htmlspecialchars($row["Domaine"]) . "</td>
                            <td>" . htmlspecialchars($row["Description"]) . "</td>
                            <td>" . htmlspecialchars(number_format($row["Cout"], 2, ',', ' ')) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune formation disponible</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='4'>Erreur lors de la récupération des données.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>