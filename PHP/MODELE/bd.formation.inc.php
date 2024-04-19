<?php

include_once('bd.inc.php');

function getFormation() {
    try {
        $cnx = connexionPDO();

        $resultat = array();

        $req = $cnx->prepare("SELECT * FROM Formations ORDER BY Domaine");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function addFormation($nom, $domaine, $description, $cout) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO Formations (Nom, Domaine, Description, Cout) VALUES (:nom, :domaine, :description, :cout)");
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':domaine', $domaine, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':cout', $cout, PDO::PARAM_INT);
        $req->execute();

        $req->closeCursor();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>