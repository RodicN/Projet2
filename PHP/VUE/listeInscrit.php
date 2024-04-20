<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if(!$_SESSION['ID_Participant']){
        header('Location: connexion.php');
        exit;
    }

    include '../MODELE/bd.inscription.inc.php';
    include '../MODELE/bd.session.inc.php';
    $idParticipant = $_SESSION['ID_Participant'];
    $participants = getInscriptionByIdP($idParticipant);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Participants par Formation</title>
    <link rel="stylesheet" href="../../CSS/session.css">
</head>
<body>
    <?php

        if ($_SESSION['statut'] == 'Salarié') {
            include('navbar.php');  // navbar pour les salariés
        } else if ($_SESSION['statut'] == 'Bénévole') {
            include('navbarU.php');  // navbar pour les bénévoles
        }

    ?>

    <h1>Liste des Participants par Formation</h1>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($participants as $participant): ?>
                <tr>
                    <td><?= htmlspecialchars($participant['Nom']) ?></td>
                    <td><?= htmlspecialchars($participant['Date']) ?></td>
                    <td><?= htmlspecialchars($participant['HeureDebut']) ?> - <?= htmlspecialchars($participant['HeureFin']) ?></td>
                    <td><?= htmlspecialchars($participant['Lieu']) ?></td>
                    <td><?= htmlspecialchars($participant['Public']) ?></td>
                    <td><?= htmlspecialchars($participant['Intervenant']) ?></td>
                    <td><?= htmlspecialchars($participant['Contenu']) ?></td>
                    <td>
                        <button onclick="if(confirm('Êtes-vous sûr de vouloir annuler cette inscription ?')) location.href='../CONTROLLEUR/supprimerInscription.php?idInscription=<?= $participant['ID_Inscription'] ?>'">Annuler</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
