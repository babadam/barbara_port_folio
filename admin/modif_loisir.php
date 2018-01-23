<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion']; => vérification de la connexion
}else{ // l'utilisateur n'est pas connecté
    header('location: connexion.php');
}


// mise à jour d'une compétence
if(isset($_POST['loisir'])){ // par le nom d'une premier input
    if(!empty($_POST['loisir'])){
        $loisir = addslashes($_POST['loisir']);
        $id_loisir = $_POST['id_loisir'];

        $pdoCV -> exec("UPDATE t_loisirs SET loisir = '$loisir' WHERE id_loisir = '$id_loisir'");
        header('location: loisirs.php');
        exit();
    }
}

// je récupère la compétence
$id_loisir = $_GET['id_loisir']; // par l'id et get
$sql = $pdoCV -> query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'"); // la requete eest égale à l'ID
$ligne_loisir = $sql -> fetch();

//pour afficher l'utilisateur
$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>

<!-- <?php echo '<pre>'; print_r($ligne_formation); echo '</pre>'; ?> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Modification d'un loisir</h2>
                </div>

                <div class="panel-body">
                    <form action="modif_loisir.php" method="post">

                        <div class="form-group">
                            <label for="loisir">Loisir :</label><br>
                            <input type="text" class="form-control" name="loisir" id ="loisir" value="<?= $ligne_loisir['loisir'] ?>"><br><br>
                        </div>

                        <input hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir'] ?>">

                        <button type="submit" class="btn btn-block">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('inc/footer.inc.php'); ?>
