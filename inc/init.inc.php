<?php

$msg_erreur='';
$page='';


// connexion BDD
$hote='localhost';
$bdd='site_cv';
$utilisateur='root';
$passe='';


try {
    $pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe) or die(print_r($pdoCV->errorInfo()));
    $pdoCV->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// requete permettant de récupérer mes infos
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

// requete permettant de récupérer mes compétences
$competences = $pdoCV -> query("SELECT * FROM t_competences");
$ligne_competence = $competences -> fetchAll(PDO::FETCH_ASSOC);

// requete permettent de récupérer mes expériences et Formations
$formations = $pdoCV -> query("SELECT * FROM t_formations");
$ligne_formation = $formations -> fetchAll(PDO::FETCH_ASSOC);



//
