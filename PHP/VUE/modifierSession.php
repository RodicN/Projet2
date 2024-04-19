<?php
session_start();

if(!$_SESSION['ID_Participant']){
    header('Location: connexion.php');
    exit;
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

include '../MODELE/bd.formation.inc.php';
include '../MODELE/bd.session.inc.php';

$formations = getFormation();


$idSession = $_GET['idSession'];
$session = getSessionById($idSession);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Session de Formation</title>
    <link rel="stylesheet" href="../../CSS/modifierSession.css">
</head>
<body>
    <h1>Modifier Session de Formation</h1>
    <form action="../CONTROLLEUR/modifierSession.php" method="post">
        <input type="hidden" name="idSession" value="<?php echo $idSession; ?>">

        <label for="id_formation">Formation:</label>
        <select id="id_formation" name="id_formation" required>
            <?php
            foreach ($formations as $formation) {
                $selected = $formation['ID_Formation'] == $session['ID_Formation'] ? 'selected' : '';
                echo "<option value='{$formation['ID_Formation']}' $selected>{$formation['Nom']}</option>";
            }
            ?>
        </select><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $session['Date']; ?>" required><br>

        <label for="horaire">Horaire:</label>
        <input type="time" id="horaireD" name="horaireD" value="<?php echo date('H:i', strtotime($session['HeureDebut'])); ?>" required><br>
        <input type="time" id="horaireF" name="horaireF" value="<?php echo date('H:i', strtotime($session['HeureFin'])); ?>" required><br>


        <label for="lieu">Lieu:</label>
        <input type="text" id="lieu" name="lieu" value="<?php echo $session['Lieu']; ?>" required><br>

        <label for="public">Public:</label>
        <input type="text" id="public" name="public" value="<?php echo $session['Public']; ?>" required><br>

        <label for="intervenant">Intervenant:</label>
        <input type="text" id="intervenant" name="intervenant" value="<?php echo $session['Intervenant']; ?>" required><br>

        <label for="contenu">Contenu:</label>
        <textarea id="contenu" name="contenu" required><?php echo $session['Contenu']; ?></textarea><br>

        <label for="dateLimiteInscription">Date Limite d'Inscription:</label>
        <input type="date" id="dateLimiteInscription" name="dateLimiteInscription" value="<?php echo $session['dateLimiteInscription']; ?>" required><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
