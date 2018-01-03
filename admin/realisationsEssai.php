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


$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC);

if(isset($_POST['r_titre'])){ // Si on a posté une nouvelle compétence
    // echo 'rentre dans ligne 6 => ok';
    if(!empty($_POST['r_titre']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_dates']) && !empty($_POST['r_description'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['r_titre']);
        $sousTitre = addslashes($_POST['r_soustitre']);
        $dates = addslashes($_POST['r_dates']);
        $description = addslashes($_POST['r_description']);
        $photo = addslashes($_POST['photo']);
        $pdoCV -> exec("INSERT INTO t_realisations (r_titre, r_soustitre, r_dates, r_description, photo, utilisateur_id) VALUES ('$titre', '$sousTitre', '$dates', '$description', '$photo', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        // header("location:realisations.php");
        // exit();

    }// ferme if n'est pas vide
}
echo '<pre>'; print_r($_FILES); echo '</pre>';
// Supression d'une compétence
if(isset($_GET['id_realisation'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_realisation'];
    $sql = " DELETE FROM t_realisations WHERE id_realisation = '$efface' ";
    $pdoCV ->query($sql);
    header("location: realisations.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_realisations =  $sql -> rowCount();


include('inc/header.inc.php');
// include('inc/nav.inc.php');

?>
<div class="container">
    <div class="row">
        <h1><?= $ligne_utilisateur['prenom']?></h1>
        <!-- <h2>Admin Baba</h2> -->
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
                           <td><?php echo $ligne_realisation['photo'] ;?></td>
                           <td><a href="modif_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="realisations.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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
                    <form action="realisations.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="r_titre">Titre</label>
                            <input type="text" class="form-control" id="r_titre" name="r_titre" placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="r_soustitre">Sous-titre</label>
                            <input type="text" class="form-control" id="r_soustitre" name="r_soustitre" placeholder="Sous-titre">
                        </div>
                        <div class="form-group">
                            <label for="r_dates">Dates</label>
                            <input type="text" class="form-control" id="r_dates" name="r_dates" placeholder="Insérez les dates">
                        </div>
                        <div class="form-group">
                            <label for="r_description">Description</label>
                            <textarea class="form-control" id="editor1" name="r_description" placeholder="Décrire la formation"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" id="photo" name="photo">
                        </div>
                        <script>
                                CKEDITOR.replace('editor1');
                        </script>

                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            <?php include('inc/footer.inc.php'); ?>