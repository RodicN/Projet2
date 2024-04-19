<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../MODELE/bd.session.inc.php');

if (isset($_GET['idSession'])) {
    $idSession = $_GET['idSession'];
    
    delSession($idSession);
}

header('Location: ../VUE/session.php');
exit;

?>
