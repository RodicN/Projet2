<?php

include_once('bd.inc.php');

function getSession() {
    try {
        $resultat = array();
        
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT S.ID_Session, F.Nom AS Formation, S.Date, S.HeureDebut, S.HeureFin, S.Lieu, S.Public, S.Intervenant, S.Contenu, S.dateLimiteInscription FROM Sessions S JOIN Formations F ON S.ID_Formation = F.ID_Formation ORDER BY S.Date ASC, S.HeureDebut ASC");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getSessionById($idSession) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM Sessions WHERE ID_Session =:idSession");
        $req->bindValue(':idSession', $idSession, PDO::PARAM_INT);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        $resultat = $ligne;

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addSession($idFormation, $date, $heureDebut, $heureFin, $lieu, $public, $intervenant, $contenu, $dateLimiteInscription) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO Sessions (ID_Formation, Date, HeureDebut, HeureFin, Lieu, Public, Intervenant, Contenu, dateLimiteInscription) VALUES (:idFormation, :date, :heureDebut, :heureFin, :lieu, :public, :intervenant, :contenu, :dateLimiteInscription)");
        $req->bindValue(':idFormation', $idFormation, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $req->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $req->bindValue(':lieu', $lieu, PDO::PARAM_STR);
        $req->bindValue(':public', $public, PDO::PARAM_STR);
        $req->bindValue('intervenant', $intervenant, PDO::PARAM_STR);
        $req->bindValue('contenu', $contenu, PDO::PARAM_STR);
        $req->bindValue('dateLimiteInscription', $dateLimiteInscription, PDO::PARAM_STR);
        $req->bindValue(':idFormation', $idFormation, PDO::PARAM_INT);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delSession($idSession) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("DELETE FROM Inscriptions WHERE ID_Session = :idSession");
        $req->bindValue(':idSession', $idSession, PDO::PARAM_INT);
        $resultat = $req->execute();

        $req = $cnx->prepare("DELETE FROM Sessions WHERE ID_Session = :idSession");
        $req->bindValue(':idSession', $idSession, PDO::PARAM_INT);
        $resultat = $req->execute();
        $req->closeCursor();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updSession($idSession, $idFormation, $date, $heureDebut, $heureFin, $lieu, $public, $intervenant, $contenu, $dateLimiteInscription) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("UPDATE Sessions SET ID_Formation=:idFormation, Date=:date, HeureDebut=:heureDebut, HeureFin=:heureFin, Lieu=:lieu, Public=:public, Intervenant=:intervenant, Contenu=:contenu, dateLimiteInscription=:dateLimiteInscription WHERE ID_Session=:idSession");
        $req->bindValue(':idSession', $idSession, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $req->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $req->bindValue(':lieu', $lieu, PDO::PARAM_STR);
        $req->bindValue(':public', $public, PDO::PARAM_STR);
        $req->bindValue('intervenant', $intervenant, PDO::PARAM_STR);
        $req->bindValue('contenu', $contenu, PDO::PARAM_STR);
        $req->bindValue('dateLimiteInscription', $dateLimiteInscription, PDO::PARAM_STR);
        $req->bindValue(':idFormation', $idFormation, PDO::PARAM_INT);

        $resultat = $req->execute();
    }catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
?>