<?php

require('inc/init.inc.php');
require('inc/header.inc.php');
require('inc/nav.inc.php');
// require('inc/fonctions.inc.php');
if(!$_SESSION['connexion'] == 'connecté') {
    header('location:connexion.php');
}
if(isset($_POST['modifie'])) {
    $id_utilisateur = addslashes($_POST['id_utilisateur']);
    $prenom         = addslashes($_POST['prenom']);
    $nom            = addslashes($_POST['nom']);
    $email          = addslashes($_POST['email']);
    $telephone      = addslashes($_POST['telephone']);
    $pseudo         = addslashes($_POST['pseudo']);
    $age            = addslashes($_POST['age']);
    $date_naissance = addslashes($_POST['date_naissance']);
    $sexe           = addslashes($_POST['sexe']);
    $adresse        = addslashes($_POST['adresse']);
    $code_postal    = addslashes($_POST['code_postal']);
    $ville          = addslashes($_POST['ville']);
    $etat_civil     = addslashes($_POST['etat_civil']);
    $pays           = addslashes($_POST['pays']);
    $site_web       = addslashes($_POST['site_web']);

    $resultat = $pdoCV->exec(
        "UPDATE t_utilisateurs SET
        prenom = '$prenom',
        nom = '$nom',
        email = '$email',
        telephone = '$telephone',
        pseudo = '$pseudo',
        age = '$age',
        date_naissance = '$date_naissance',
        sexe = '$sexe',
        etat_civil = '$etat_civil',
        adresse = '$adresse',
        code_postal = '$code_postal',
        ville = '$ville',
        pays = '$pays',
        site_web = '$site_web'
        WHERE id_utilisateur = '$id_utilisateur'");
    if($resultat) {
        header('location:index.php');
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Modification d'un utilisateur</h2>
                </div>

                <div class="panel-body">
                    <form method="post" action="modif_utilisateurs.php">
                        <input type="hidden" name="id_utilisateur" value="<?= $ligne_utilisateur['id_utilisateur']; ?>">

                        <div class="form-group">
                            <label for ="prenom">Prenom</label>
                            <input type="text" class="form-control" name="prenom" value="<?= $ligne_utilisateur['prenom']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" value="<?= $ligne_utilisateur['nom']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="email">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $ligne_utilisateur['email']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="pseudo">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo" value="<?= $ligne_utilisateur['pseudo']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="telephone">Télephone</label>
                            <input type="text" class="form-control" name="telephone" value="<?= $ligne_utilisateur['telephone']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="age">Age</label>
                            <input type="text" class="form-control" name="age" value="<?= $ligne_utilisateur['age']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="date_naissance">Date de naissance</label>
                            <input type="text" class="form-control" name="date_naissance" value="<?= $ligne_utilisateur['date_naissance']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="sexe">Sexe</label>
                            <input type="text" class="form-control" name="sexe" value="<?= $ligne_utilisateur['sexe']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="etat_civil">Etat civil</label>
                            <input type="text" class="form-control" name="etat_civil" value="<?= $ligne_utilisateur['etat_civil']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="adresse">Adresse</label>
                            <input type="text" class="form-control" name="adresse" value="<?= $ligne_utilisateur['adresse']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="code_postal">Code postal</label>
                            <input type="text" class="form-control" name="code_postal" value="<?= $ligne_utilisateur['code_postal']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="ville">Ville</label>
                            <input type="text" class="form-control" name="ville" value="<?= $ligne_utilisateur['ville']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="pays">Pays</label>
                            <input type="text" class="form-control" name="pays" value="<?= $ligne_utilisateur['pays']; ?>">
                        </div>

                        <div class="form-group">
                            <label for ="site_web">Site web</label>
                            <input type="text" class="form-control" name="site_web" value="<?= $ligne_utilisateur['site_web']; ?>">
                        </div>

                        <input type="submit" name="modifie" class="btn btn-block" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/footer.inc.php'); ?>
