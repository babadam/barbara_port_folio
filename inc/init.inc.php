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

// requete permettant de récupérer les infos de l'utilisateur
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

// requete permettant de récupérer les compétences de l'utilisateur
$competences = $pdoCV -> query("SELECT * FROM t_competences WHERE utilisateur_id = 1");
$ligne_competence = $competences -> fetchAll(PDO::FETCH_ASSOC);



//
