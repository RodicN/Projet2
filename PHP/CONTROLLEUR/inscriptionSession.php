<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include ('../MODELE/bd.participant.inc.php');
include ('../MODELE/bd.inscription.inc.php');

// Vérifier que la méthode HTTP utilisée est POST


    $idParticipant = $_SESSION['ID_Participant'];
    $idSession = $_GET['idSession'];

    addInscription($idParticipant, $idSession);


    header("Location: ../VUE/listeInscrit.php");
    exit();


?>