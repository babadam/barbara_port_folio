<?php
include('inc/init.inc.php');

if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];

    // echo $_SESSION['connexion'];
}else{ // l'utilisateur n'est pas connecté
    header('location: connexion.php');
}

if(!empty($_POST)){ // Si on a posté une nouvelle compétence
    if(empty($_POST['competence'])){
        $erreur_competence .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs titre</div>';
    }
    if(empty($_POST['c_niveau'])){
        $erreur_niveau .= '<div class="alert alert-danger" role="alert">Veuillez renseigner le champs sous-titre</div>';
    }
    if( !is_numeric($_POST['c_niveau']) || ($_POST['c_niveau'] > 100 )){
        $erreur_niveau .= '<div class="alert alert-danger" role="alert">Le niveau doit être un nombre compris entre 0 et 100</div>';
    }
    if((empty($erreur_competence)) && (empty($erreur_niveau))){ // Si compétence n'est pas vide
        $categorie = addslashes($_POST['categorie']);
        $sql = $pdoCV -> prepare("INSERT INTO t_competences (id_competence, competence, c_niveau, categorie, utilisateur_id) VALUES (NULL, :competence, :c_niveau, '$categorie', $id_utilisateur)");
        $sql->bindParam(':competence', addslashes($_POST['competence']), PDO::PARAM_STR);
        $sql->bindParam(':c_niveau', addslashes($_POST['c_niveau']), PDO::PARAM_INT);
        $sql->execute();
        header("location:competences.php");
        exit();
    }// ferme if n'est pas vide

} // ferme le if isset insertion

// Supression d'une compétence
if(isset($_GET['id_competence'])){
 // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_competence'];
    $sql = " DELETE FROM t_competences WHERE id_competence = '$efface' ";
    $pdoCV ->query($sql);
    header("location: competences.php");
} // ferme le if isset supression

    $sql = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '$id_utilisateur'");
    $sql -> execute();
    $nbr_competences =  $sql -> rowCount();


include('inc/header.inc.php');
include('inc/nav.inc.php');
?>
<div class="container">
    <div class="row">
        <h1> Compétences</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_competences <= 1){
                        echo $nbr_competences.' competence';
                    }else{
                        echo $nbr_competences.' competences';
                    }?></p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>Liste des competences</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Compétence</th>
                            <th>Niveau en %</th>
                            <th>Catégorie</th>
                            <th>Modification</th>
                            <th>Supression</th>
                        </tr>
                        <tr>
                        <?php while($ligne_competence = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                           <td><?php echo $ligne_competence['competence'] ;?></td>
                           <td><?php echo $ligne_competence['c_niveau'] ;?></td>
                           <td><?php echo $ligne_competence['categorie'] ;?></td>
                           <td><a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-success">Modifier</button></a></td>
                           <td><a href="competences.php?id_competence=<?= $ligne_competence['id_competence']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Etes vous sûre de vouloir supprimer cette compétence ?');">Supprimer</button></a></td>
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
                        <p>Insertion d'une competence</p>
                </div>
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="competence">Compétence</label>
                            <?= $erreur_competence; ?>
                            <input type="text" class="form-control" id="competence" name="competence" placeholder="Insérez votre competence">
                        </div>
                        <div class="form-group">
                            <label for="c_niveau">Niveau</label>
                            <?= $erreur_niveau; ?>
                            <input type="text" class="form-control" id="c_niveau" name="c_niveau" placeholder="Insérez votre competence">
                        </div>
                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" name="categorie">
                                <option value="dev_front">Développement front</option>
                                <option value="dev_back">Développement back</option>
                                <option value="framework">Framework</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-block">Insérer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>
