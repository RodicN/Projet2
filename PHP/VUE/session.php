<?php
    session_start();

    if(!$_SESSION['ID_Participant']){
        header('Location: connexion.php');
        exit;
    }
?>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../MODELE/bd.session.inc.php'; // Inclut le script de connexion à la base de données

// Récupération des sessions pour affichage
$sessions = getSession();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Sessions de Formations</title>
    <link rel="stylesheet" href="../../CSS/session.css">
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

    <h1>Liste des Sessions de Formations</h1>
    <table>
        <thead>
            <tr>
                <th>Formation</th>
                <th>Date</th>
                <th>Horaire</th>
                <th>Lieu</th>
                <th>Public</th>
                <th>Intervenant</th>
                <th>Contenu</th>
                <th>Date Limite d'Inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($sessions) > 0): ?>
                <?php foreach ($sessions as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Formation']) ?></td>
                        <td><?= htmlspecialchars(date('d/m/Y', strtotime($row['Date']))) ?></td>
                        <td><?= htmlspecialchars(date('H:i', strtotime($row['HeureDebut']))) ?> <br> - <br> <?= htmlspecialchars(date('H:i', strtotime($row['HeureFin']))) ?></td>
                        <td><?= htmlspecialchars($row['Lieu']) ?></td>
                        <td><?= htmlspecialchars($row['Public']) ?></td>
                        <td><?= htmlspecialchars($row['Intervenant']) ?></td>
                        <td><?= htmlspecialchars($row['Contenu']) ?></td>
                        <td><?= htmlspecialchars(date('d/m/Y', strtotime($row['dateLimiteInscription']))) ?></td>
                        <td>
                            <button onclick="location.href='modifierSession.php?idSession=<?= $row['ID_Session'] ?>'">Modifier</button>
                            <button onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cette session?')) location.href='../CONTROLLEUR/supprimerSession.php?idSession=<?= $row['ID_Session'] ?>'">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="9">Aucune session disponible</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
