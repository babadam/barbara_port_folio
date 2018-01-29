<?php

require_once('inc/init.inc.php');
require_once('inc/fonctions.inc.php');

//Traitement pour la deconnexion de l'admin
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    $_SESSION['connexion']=''; // on vide les variables de SESSION
    $_SESSION['id_utilisateur']='';
    $_SESSION['prenom']='';
    $_SESSION['nom']='';
    $_SESSION['pseudo']='';

    unset($_SESSION['connexion']); // connexion = name du bouton submit
    session_destroy();
    header('location: connexion.php');
} // fin traitement déconnexion de l'admin

if(!empty($_POST)){
    // On vérifie que les deux champs ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        // On connecte le membre en enregistrant ses infos dans la session
        // -> Le membre existe-t-il en BDD ?
        $sql = $pdoCV -> prepare("SELECT * FROM t_utilisateurs WHERE pseudo = :pseudo");
        $sql -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $sql -> execute();
        
        if($sql -> rowCount() > 0){ // le pseudo existe en BDD 
            // -> Le MDP saisi correspond au pseudo en BDD
            $ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC); // je récupère toutes les infos du membre qui souhaite se connecter sous la forme d'un array indéxé
            if($ligne_utilisateur['mdp'] == ($_POST['mdp'])){ // 
                // Tout est OK on peut connecter l'utilisateur
                 $_SESSION['connexion']='connecté';
                 $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur']; // on stocke dans la SESSION les infos de l'utilisateur
                 $_SESSION['prenom']=$ligne_utilisateur['prenom']; 
                 $_SESSION['nom']=$ligne_utilisateur['nom']; 
                 $_SESSION['pseudo']=$ligne_utilisateur['pseudo']; 

                header('location: index.php'); 
            } // fin if vérification du mdp
            else{
                $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Mot de passe invalide !</div>';
            }
        } // fin du rowCount
        else{
            $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Le pseudo '. $_POST['pseudo'].' n\'est pas reconnu.</div>';
        }
    } // fin !empty($_POST['pseudo']) && !empty($_POST['mdp'])
    else{
        $msg_erreur .= '<div class="alert alert-danger col-md-offset-3 col-md-6"> Veuillez renseigner un pseudo et un mot de passe !</div>';
    }
} //fin (!empty($_POST))

require_once('inc/header.inc.php');

?>
<!-- Contenu HTML -->

    <div class="container">
        <div class="row">
            <h1 class="col-md-1 col-md-offset-5">Connexion</h1>
            <?= $msg_erreur ?>
            <form method="post" action="connexion.php">
                <div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-6 col-sm-offset-1">
                    <div class="panel panel-default">
                    <div class="panel-body" id="connexion">
                        <div class="form-group">
                            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                        </div>
                        <input type="submit" class="btn btn-primary btn-block couleur" value="Connexion" name=connexion>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div><!-- /.container -->

<?php
require_once('inc/footer.inc.php');
?>
