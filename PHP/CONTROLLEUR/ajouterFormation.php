<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../MODELE/bd.formation.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupération des données du formulaire
    $nom = ($_POST['nom']);
    $domaine = ($_POST['domaine']);
    $description = ($_POST['description']);
    $cout = ($_POST['cout']);

    addFormation($nom, $domaine, $description, $cout);

    header('Location: ../VUE/catalogue.php');
}
?>
