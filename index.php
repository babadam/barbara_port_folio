<?php
require_once('inc/init.inc.php');
require('class/Contact.class.php');

// on vérifie que le formulaire a été posé
if(!empty($_POST)){
    // on éclate le $_POST en tableau qui permet d'accéder directement aux champ par des variables
    extract($_POST);

    // on affectue une validation des données du formulaire et on vérifie la validité de l'Email
    $valid = (empty($nom) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($telephone) || empty($sujet) || empty($message)) ? false : true; // écriture ternaire pour if/else

    $erreurnom = (empty($nom)) ? 'Indiquez votre nom' : null;
    $erreuremail = (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) ? 'Indiquez votre email' : null;
    $erreurtelephone = (empty($telephone)) ? 'Indiquez votre telephone' : null;
    $erreursujet = (empty($sujet)) ? 'Indiquez votre sujet' : null;
    $erreurmessage = (empty($message)) ? 'Indiquez votre message' : null;

    // si tous les champs sont correctement renseignés
    if ($valid) {
    	// on crée un nouvel objet (ou une instance) de la class Contact.class.php
        $contact = new Contact($pdoCV);

        // on utilise la méthode insertContact pour insérer en BDD
        $contact->insertContact($nom, $email, $telephone, $sujet, $message);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Site Cv <?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']?></title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="description" content="Site Cv Tousverts Barbara : développeuse - intégratrice web junior">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans|Rubik+Mono+One|Playfair+Display|Merriweather+Sans" rel="stylesheet">
    </head>
    <body>
        <nav id="main-nav">
            <a id="toggle-nav" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul id="toggle-ul">
                <a href="#slide-competence" class="toggle-a"><li>Compétences</li></a>
                <a href="#slide-realisation" class="toggle-a"><li>Réalisations</li></a>
                <a href="#slide-experience/formation" class="toggle-a"><li>Experiences & Formations</li></a>
                <a href="#slide-contact" class="toggle-a"><li>Contact</li></a>
            </ul>
        </nav>
        <main>
            <div id="slide1">
                <div class="slide_inside">
                    <div class="info">
                        <h1>Barbara Tous<span>verts</span> </h1>
                        <p>
                            Agée de 26 ans, je suis actuellement en formation de développement et d'intégration web depuis sept mois. <br>
                        </p>
                         <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>06 63 57 70 89</p>
                            </div>
                            <div class="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <p>barbara.tousverts@live.fr</p>
                        </div>
                        <p><a href="">Contactez - moi</a></p>
                    </div>
                    <!-- <p class="typed"><span id="holder"></span><span class="blinking-cursor">|</span></p> -->
                </div>
            </div>
            <div id="slide2">
                <div class="slide_inside" id="slide_competence">
                    <h2>Compétences</h2>

                    <div class="container-skillbar">
                           <?php
                           for($i=0; $i<count($ligne_competence); $i++){?>
                               <div class="skillbar clearfix " data-percent="<?= $ligne_competence[$i]['c_niveau']; ?>%">
    		                       <div class="skillbar-title skillbar-title-<?= $ligne_competence[$i]['competence']; ?>"><span><?= $ligne_competence[$i]['competence']; ?></span></div>
    		                       <div class="skillbar-bar skillbar-bar-<?= $ligne_competence[$i]['competence']; ?>"></div>
    		                       <div class="skillbar-percent"><?= $ligne_competence[$i]['c_niveau']; ?>%</div>
    	                       </div>
                            <?php } ?>
                       </div><!-- Ende container Skill Bar -->
                </div>
            </div>
            <div id="slide3">
                <div class="slide_inside" id="slide_formation">
                    <h2>Experiences & formations</h2>
                    <div class="container-formation">
                        <?php
                         for($i=0; $i<count($ligne_formation); $i++){?>
                            <div class="formation">
                                <div class="date_formation">
                                    <p><?= $ligne_formation[$i]['f_dates'] ?></p>
                                </div>
                                <div class="description_form">
                                    <span><?= $ligne_formation[$i]['f_titre'] ?></span>
                                    <p><?= $ligne_formation[$i]['f_soustitre'] ?></p>
                                    <p><?= $ligne_formation[$i]['f_description'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div id="slide4">

            </div>
            <div id="slide5">
                <div class="slide_inside" id="slide_contact">
                    <h2>Me contacter</h2>
					<div class="container-form" id="container-form">
                        <div class="text-form">
                            <p>Pour plus d'informations, n'hésitez pas à me contactez et je vous répondrai dans les meilleurs délais.</p>
                        </div>
						<form method="post" action="index.php#slide_contact">
                            <div class="group-input-1">
                                <span class="error"><?php if (isset($erreurnom)) echo $erreurnom; ?></span>
                                <input type="text" name="nom" id="nom" value="" placeholder="Nom"><br>

                                <span class="error"><?php if (isset($erreuremail)) echo $erreuremail; ?></span>
                                 <input type="email" name="email" id="email" value="" placeholder="Email"><br>

                                 <span class="error"><?php if (isset($erreurtelephone)) echo $erreurtelephone; ?></span>
                                 <input type="text" name="telephone" id="phone" value="" placeholder="Téléphone"><br>
                            </div>
							 <div class="group-input-2">
                                 <span class="error"><?php if (isset($erreursujet)) echo $erreursujet; ?></span>
                                 <input type="text" name="sujet" id="sujet" value="" placeholder="Sujet"><br>

                                 <span class="error"><?php if (isset($erreurmessage)) echo $erreurmessage; ?></span>
                                 <textarea name="message" rows="8" cols="40" id=message placeholder="Message"></textarea>
                             </div>
                            <input type="submit" name="" value="Envoyer" id="btn-form">
						</form>
					</div>
                </div>
            </div>
        </main>
            <footer>
                <p>Bas</p>
            </footer>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
