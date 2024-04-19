<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../MODELE/bd.inscription.inc.php');

if (isset($_GET['idInscription'])) {
    $idSession = $_GET['idInscription'];
    
    delInscription($idSession);
}

header('Location: ../VUE/listeInscrit.php');
exit;

?>