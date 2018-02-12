<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: index.php');
}


if(!empty($_POST)){ // Si on a posté une nouvelle compétence
    if(empty($_POST['r_titre'])){
        $erreur_titre .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs titre</div>';
    }
    if(empty($_POST['r_soustitre'])){
        $erreur_soustitre .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs sous-titre</div>';
    }
    if(empty($_POST['r_dates'])){
        $erreur_date .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs dates</div>';
    }
    if((empty($erreur_titre)) && (empty($erreur_soustitre)) && (empty($erreur_date))){
    // echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['r_titre']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_dates']) && !empty($_POST['r_description'])){ // Si réalisation n'est pas vide
        $titre = addslashes($_POST['r_titre']);
        $sousTitre = addslashes($_POST['r_soustitre']);
        $dates = addslashes($_POST['r_dates']);
        $description = addslashes($_POST['r_description']);
        $photo = addslashes($_POST['r_photo']);
        $pdoCV -> exec("INSERT INTO t_realisations (r_titre, r_soustitre, r_dates, r_description, r_photo, utilisateur_id) VALUES ('$titre', '$sousTitre', '$dates', '$description', '$photo', '$id_utilisateur')");
        header("location:realisations.php");
        exit();
        }// ferme if n'est pas vide
    }
}
// echo '<pre>'; print_r($_FILES); echo '</pre>';
// Supression d'une compétence
if(isset($_GET['id_realisation'])){
 // on récupère la réalisation par son ID dans l'url
    $efface = $_GET['id_realisation'];
    $sql = " DELETE FROM t_realisations WHERE id_realisation = '$efface' ";
    $pdoCV ->query($sql);
    header("location: realisations.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_realisations =  $sql -> rowCount();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1>Réalisations</h1>
    </div>
    <!-- <?php echo $msg ?> -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_realisations <= 1){
                        echo $nbr_realisations.' realisation';
                        }else{
                        echo $nbr_realisations.' realisations';
                        }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des réalisations</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Titre</th>
                            <th>Soustitre</th>
                            <th>Dates</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>

                        </tr>
                        <tr>
                        <?php while($ligne_realisation = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_realisation['r_titre'] ;?></td>
                           <td><?php echo $ligne_realisation['r_soustitre'] ;?></td>
                           <td><?php echo $ligne_realisation['r_dates'] ;?></td>
                           <td><?php echo $ligne_realisation['r_description'] ;?></td>
                           <td><?php echo $ligne_realisation['r_photo'] ;?></td>
                           <td><a href="modif_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="realisations.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>" onclick="return confirm('Etes vous sûre de vouloir supprimer cette compétence ?');"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                       </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                        <p>Insertion d'une réalisation</p>
                </div>
                <div class="panel-body">
                    <form action="realisations.php" method="post" >
                        <div class="form-group">
                            <label for="r_titre">Titre</label>
                            <?= $erreur_titre; ?>
                            <input type="text" class="form-control" id="r_titre" name="r_titre" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="r_soustitre">Sous-titre</label>
                            <?= $erreur_soustitre; ?>
                            <input type="text" class="form-control" id="r_soustitre" name="r_soustitre" placeholder="Sous-titre">
                        </div>
                        <div class="form-group">
                            <label for="r_dates">Dates</label>
                            <?= $erreur_date; ?>
                            <input type="text" class="form-control" id="r_dates" name="r_dates" placeholder="Insérez les dates">
                        </div>
                        <div class="form-group">
                            <label for="r_description">Description</label>
                            <textarea class="form-control" id="editor1" name="r_description" placeholder="Décrire la formation"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="r_photo">Photo</label>
                            <input type="file" id="r_photo" name="r_photo">
                        </div>
                        <script>
                                CKEDITOR.replace('editor1');
                        </script>

                        <button type="submit" class="btn btn-block">Insérer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.inc.php'); ?>
