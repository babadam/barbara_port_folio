<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){ // si pas connecté : redirection vers le formulaire de ocnnexion
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexion.php');
}

if(!empty($_POST)){ // Si on a posté une nouvelle compétence

    if(empty($_POST['f_titre'])){
        $erreur_titre .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs titre</div>';
    }
    if(empty($_POST['f_soustitre'])){
        $erreur_soustitre .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs sous-titre</div>';
    }
    if(empty($_POST['f_dates'])){
        $erreur_date .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs dates</div>';
    }
    if((empty($erreur_titre)) && (empty($erreur_soustitre)) && (empty($erreur_date))){
        $sql = $pdoCV->prepare("INSERT INTO t_formations (f_titre, f_soustitre, f_dates, f_description, utilisateur_id) VALUES (:f_titre, :f_soustitre, :f_dates, :f_description, '1')");

        $sql->bindParam(':f_titre', addslashes($_POST['f_titre']), PDO::PARAM_STR);
        $sql->bindParam(':f_soustitre', addslashes($_POST['f_soustitre']), PDO::PARAM_STR);
        $sql->bindParam(':f_dates', addslashes($_POST['f_dates']), PDO::PARAM_STR);
        $sql->bindParam(':f_description', addslashes($_POST['f_description']), PDO::PARAM_STR);
        $sql->execute();
        header('location:formations.php');
        exit();
    }
}


// Supression d'une compétence
if(isset($_GET['id_formation'])){
 // on récupère la formation par son ID dans l'url
    $efface = $_GET['id_formation'];
    $sql = " DELETE FROM t_formations WHERE id_formation = '$efface' ";
    $pdoCV ->query($sql);
    header("location: formations.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_formations WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_formations =  $sql -> rowCount();


include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1>Formations</h1>
    </div>
    <!-- <?php echo $msg ?> -->
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_formations <= 1){
                        echo $nbr_formations.' formation';
                        }else{
                        echo $nbr_formations.' formations';
                        }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des formations</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Titre</th>
                            <th>Soustitre</th>
                            <th>Dates</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <tr>
                        <?php while($ligne_formation = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_formation['f_titre'] ;?></td>
                           <td><?php echo $ligne_formation['f_soustitre'] ;?></td>
                           <td><?php echo $ligne_formation['f_dates'] ;?></td>
                           <td><?php echo $ligne_formation['f_description'] ;?></td>
                           <td><a href="modif_formation.php?id_formation=<?= $ligne_formation['id_formation']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a onclick="return confirm('Etes vous sûre de vouloir supprimer cette compétence ?');" href="formations.php?id_formation=<?= $ligne_formation['id_formation']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
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
                        <p>Insertion d'une formation</p>
                </div>
                <div class="panel-body">
                    <form action="formations.php" method="post">
                        <div class="form-group" id="form-group">
                            <label for="f_titre">Titre</label>
                            <?= $erreur_titre; ?>
                            <input type="text" class="form-control" id="f_titre" name="f_titre" placeholder="Titre">
                        </div>
                        <div class="form-group" id="form-group">
                            <label for="f_soustitre">Sous-titre</label>
                            <?= $erreur_soustitre; ?>
                            <input type="text" class="form-control" id="f_soustitre" name="f_soustitre" placeholder="Sous-titre">
                        </div>
                        <div class="form-group" id="form-group">
                            <label for="f_dates">Dates</label>
                            <?= $erreur_date; ?>
                            <input type="text" class="form-control" id="f_dates" name="f_dates" placeholder="Insérez les dates">
                        </div>
                        <div class="form-group" id="form-group">
                            <label for="f_description">Description</label>
                            <textarea class="form-control" id="editor1" name="f_description" placeholder="Décrire la formation"></textarea>
                        </div>
                        <script>
                                CKEDITOR.replace('editor1');
                        </script>
                        <button type="submit" name='inserer' class="btn btn-block">Insérer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.inc.php'); ?>
