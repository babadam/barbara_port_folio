<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion']; // vérification de la connexion
}else{ // l'utilisateur n'est pas connecté
    header('location: connexion.php');
}

// mise à jour d'une compétence
if(isset($_POST['competence'])){ // par le nom d'une premier input
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau']) && !empty($_POST['categorie']) && !empty($_POST['id_competence'])){ // Si compétence n'est pas vide
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $categorie = addslashes($_POST['categorie']);
        $id_competence = $_POST['id_competence'];

        $pdoCV -> exec("UPDATE t_competences SET competence = '$competence', c_niveau = '$c_niveau', categorie = '$categorie' WHERE id_competence = '$id_competence'");

        header('location: competences.php');
        exit();
    }
}

// je récupère la compétence
$id_competence = $_GET['id_competence']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete eest égale à l'ID
$ligne_competence = $sql -> fetch();

$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Modification d'une compétence</h2>
                </div>

                <div class="panel-body">
                    <form action="modif_competence.php" method="post">

                        <div class="form-group">
                            <label for="competence">Compétence :</label><br>
                            <input type="text" class="form-control" name="competence" id ="competence" value="<?= $ligne_competence['competence'] ?>"><br><br>
                        </div>

                        <div class="form-group">
                            <label for="c_niveau">Niveau :</label><br>
                            <input type="number" class="form-control" name="c_niveau" id= "c_niveau" value="<?= $ligne_competence['c_niveau'] ?>"><br><br>
                        </div>

                        <div  class="form-group">
                            <label for="categorie">Niveau :</label><br>
                            <select class="form-control" name="categorie">
                                <option value="dev_front">Développement front</option>
                                <option value="dev_back">Développement back</option>
                                <option value="framework">Framework</option>
                            </select><br>
                        </div>

                        <input hidden name="id_competence" value="<?= $ligne_competence['id_competence'] ?>">

                        <input type="submit" class="btn btn-block" value="Modifier">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>
