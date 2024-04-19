<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../MODELE/bd.session.inc.php');

// Vérifier que la méthode HTTP utilisée est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire
    $idFormation = $_POST['id_formation'];
    $date = $_POST['date'];
    $heureDebut = $_POST['horaireD'];
    $heureFin = $_POST['horaireF'];
    $lieu = $_POST['lieu'];
    $public = $_POST['public'];
    $intervenant = $_POST['intervenant'];
    $contenu = $_POST['contenu'];
    $dateLimiteInscription = $_POST['dateLimiteInscription'];

    addSession($idFormation, $date, $heureDebut, $heureFin, $lieu, $public, $intervenant, $contenu, $dateLimiteInscription);

    header('Location: ../VUE/session.php');
} else {
    // Si la méthode n'est pas POST, afficher une erreur
    echo "Erreur : Méthode HTTP non autorisée.";
}
?>
