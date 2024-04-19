<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../MODELE/bd.session.inc.php');

// Gérer la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idSession'])) {
    // Récupération des données du formulaire
    $idSession = $_POST['idSession'];
    $idFormation = $_POST['id_formation'];
    $date = $_POST['date'];
    $heureDebut = $_POST['horaireD'];
    $heureFin = $_POST['horaireF'];
    $lieu = $_POST['lieu'];
    $public = $_POST['public'];
    $intervenant = $_POST['intervenant'];
    $contenu = $_POST['contenu'];
    $dateLimiteInscription = $_POST['dateLimiteInscription'];


    updSession($idSession, $idFormation, $date, $heureDebut, $heureFin, $lieu, $public, $intervenant, $contenu, $dateLimiteInscription);


    header('Location:../VUE/session.php');
}
?>