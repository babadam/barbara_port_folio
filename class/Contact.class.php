<?php

/* Etape 4 - Contact.class.php */
/*
 * Une classe c'est en fait un plan à partir duquel on va pouvoir créer plusieurs objets
 * un peu comme un moule dont on en obtient comme objets des gâteaux
 *
 * Une classe peut contenir plusieurs méthodes (ou fonctions)
 * par ex. une classe voiture peut avoir comme méthodes 'freiner' et 'accélerer'
 * et quand je créé un objet de la classe voiture, par ex. un 308 ou une porsche qui auront les
 * fonctionnalités de la classe voiture comme 'freiner' et 'accélerer'
 */

 class Contact {
 	// déclaration des variables = champs de la table t_commentaires.sql
    private $nom;
    private $email;
    private $telephone;
    private $sujet;
    private $message;
    private $pdoCV; // je crée un élément

    public function __construct($pdoCV){ // fait le lien par le nom avec le $pdocv de la connexion BDD
        $this->pdoCV = $pdoCV;
    }

    // fonction d'insertion en BDD
    public function insertContact($nom, $email, $telephone, $sujet, $message){
        $this->nom = strip_tags($nom);
        $this->email = strip_tags($email);
        $this->telephone = strip_tags($telephone);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);


   // on crée une requête puis on l'exécute
        $req = $this->pdoCV->prepare('INSERT INTO t_commentaires (nom, email, telephone, sujet, message) VALUES (:nom, :email, :telephone, :sujet, :message)');
        $req->execute([
            ':nom' => $this->nom,
            ':email' => $this->email,
            ':telephone' => $this->telephone,
            ':sujet' => $this->sujet,
            ':message' => $this->message]);

            $req->closeCursor();

    }
}
