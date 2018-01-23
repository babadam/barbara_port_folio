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

// récupérer les messages du formulaire de contact
$sql = $pdoCV -> prepare("SELECT * FROM t_commentaires WHERE utilisateur_id = '$id_utilisateur'");
$sql -> execute();
$nbr_commentaires =  $sql -> rowCount();

include('inc/header.inc.php');
include('inc/nav.inc.php');
?>

<div class="container">
    <div class="row">
        <h1>Messages</h1>
    </div>

    <div class="row">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> Il y a <?php if ($nbr_commentaires <= 1){
                        echo $nbr_commentaires.' message';
                    }else{
                        echo $nbr_commentaires.' messages';
                    }?></p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Supprimer</th>
                            </tr>
                            <tr>
                            <?php while($ligne_commentaire = $sql -> fetch(PDO::FETCH_ASSOC) ) {?>
                               <td><?php echo $ligne_commentaire['nom'] ;?></td>
                               <td><?php echo $ligne_commentaire['email'] ;?></td>
                               <td><?php echo $ligne_commentaire['telephone'] ;?></td>
                               <td><?php echo $ligne_commentaire['sujet'] ;?></td>
                               <td><?php echo $ligne_commentaire['message'] ;?></td>
                               <td><a href="messages.php?id_commentaire=<?= $ligne_commentaire['id_commentaire']; ?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
                           </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
