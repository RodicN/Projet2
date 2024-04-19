<?php

include_once('bd.inc.php');

function addParticipant($nom, $prenom, $email, $motDePasse, $statut) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO Participants (ID_Participant, Nom, Prenom, Email, MotDePasse, Statut) VALUES (NULL, :nom, :prenom, :email, :motDePasse, :statut)");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $req->bindValue(':statut', $statut, PDO::PARAM_STR);

        $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function login($email, $motDePasse) {
    try {
        $cnx = connexionPDO();

        $stmt = $cnx->prepare("SELECT * FROM Participants WHERE Email=:email AND MotDePasse=:motDePasse");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $result;
}


?>