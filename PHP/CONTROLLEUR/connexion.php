<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../MODELE/bd.participant.inc.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = login($username, $password);

    if ($user) {
        $_SESSION['ID_Participant'] = $user['ID_Participant'];
        $_SESSION['nom'] = $user['Nom'];
        $_SESSION['prenom'] = $user['Prenom'];
        $_SESSION['statut'] = $user['Statut'];
        header('Location:../VUE/choixInscriptionSession.php');
        exit();
    } else {
        header('Location:../VUE/connexion.php?error=invalid_credentials');
        exit();
    }

    
}
?>
