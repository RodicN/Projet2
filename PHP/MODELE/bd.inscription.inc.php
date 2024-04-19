<?php

include_once('bd.inc.php');

function addInscription($idParticipant, $idSession) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO Inscriptions (ID_Participant, ID_Session) values (:idParticipant, :idSession)");
        $req->bindValue(':idParticipant', $idParticipant, PDO::PARAM_INT);
        $req->bindValue(':idSession', $idSession, PDO::PARAM_INT);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getInscriptionByIdP($idParticipant) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM Inscriptions, Sessions, Formations WHERE Inscriptions.ID_Session = Sessions.ID_Session AND Sessions.ID_Formation = Formations.ID_Formation AND Inscriptions.ID_Participant =:idParticipant");
        $req->bindValue(':idParticipant', $idParticipant, PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delInscription($idInscription) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("DELETE FROM Inscriptions WHERE ID_Inscription = :idInscription");
        $req->bindValue(':idInscription', $idInscription, PDO::PARAM_INT);
        $resultat = $req->execute();
        $req->closeCursor();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>