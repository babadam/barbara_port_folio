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
        <title>Site CV Barbara Tousverts : développeuse - intégratrice web</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="description" content="Site Cv Barbara Tousverts : développeuse - intégratrice web junior">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans|Rubik+Mono+One|Playfair+Display|Merriweather+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Yanone+Kaffeesatz" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">


    </head>
    <body>
        <nav id="main-nav">
			<a id="toggle-nav" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <div id="toggle-ul">
                <a href="#slide2" class="toggle-a js-scrollTo"><li>Compétences</li></a>
                <a href="#slide4" class="toggle-a js-scrollTo"><li>Réalisations</li></a>
                <a href="#slide3" class="toggle-a js-scrollTo"><li>Experiences & Formations</li></a>
                <a href="#slide5" class="toggle-a js-scrollTo"><li>Contact</li></a>
            </div>
        </nav>
        <main>
            <div id="slide1">
                <div class="slide_inside" id="slide-accueil">
                    <div class="info">
                        <h1>Barbara Tous<span>verts</span> </h1>
                        <h2>Développeuse - intégratrice web : je recherche un stage</h2>
                        <div class="info-description">
                            <p class="p-info"> Agée de 26 ans, je suis actuellement en formation de développement et d'intégration web depuis sept mois.</p>
                        </div>
                        <div class="info-contact">
                            <div class="contact">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>06 63 57 70 89</span><br>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span><a href="mailto:barbara.tousverts@gmail.com">barbara.tousverts@live.fr</a></span>
                            </div>
                            <div class="r-sociaux">
                                <a href="https://github.com/babadam"><i class="fa fa-github" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/TousvertsB"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/in/barbara-tousverts-05a9a8146/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="acces-form">
                            <a href="#slide5" class="js-scrollTo">contactez-moi</a>
                        </div>
                    </div>
                    <!-- <p class="typed"><span id="holder"></span><span class="blinking-cursor">|</span></p> -->
                </div>
            </div>
            <div id="slide2">
                <div class="slide_inside" id="slide_competence">
                    <h3>Compétences</h3>

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
                    <h3>Expériences & formations</h3>
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
                <div class="slide_inside" id="slide_realisation">
                    <section id="image">
                        <h3>Réalisations</h3>
                        <div class="imgFlex">
                            <figure>
                                <img src="img/real1.png" alt="Mon premier site CV">
                                <figcaption>HTML - CSS - Jquery - PHP - PHP orienté objet - MySql</figcaption>
                            </figure>
                            <figure>
                                <a href="real/real2/" target="_blank"><img src="img/real2.png" alt="Exercice Intégration HTML - CSS"></a>
                                <figcaption>Exercice d'intégration HTML - CSS</figcaption>
                            </figure>
                            <figure class="figDroite">
                                <a href="real/real3/" target="_blank"><img src="img/real3.png" alt="Premier site en HTML - CSS"></a>
                                <figcaption>Premier site en HTML - CSS</figcaption>
                            </figure>
                        </div>
                    </section>
                </div>
            </div>
            <div id="slide5">
                <div class="slide_inside" id="slide_contact">
                    <h3 id="h3_slide5">Me contacter</h3>
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
                            <input type="submit" name="envoyer" value="Envoyer" id="btn-form">
						</form>
					</div>
                </div>
            </div>
        </main>
            <footer>
                <p id="footer-copyright"><i class="fa fa-copyright" aria-hidden="true"></i><?= ' '. $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom'] . ' ' . date('Y') ?></p>
                <p id="link-backoffice"><a href="admin/connexion.php">Backoffice</a></p>
            </footer>
        <script src="js/main.js"></script>
    </body>
</html>
