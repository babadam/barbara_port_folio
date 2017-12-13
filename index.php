<?php
require_once('admin/inc/init.inc.php');

$competences = $pdoCV -> query("SELECT * FROM t_competences WHERE utilisateur_id = 1");
$ligne_competence = $competences -> fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Responsive fluid & adaptatif</title>
        <link rel="stylesheet" href="css/style.css">
        <meta name="description" content="Responsive_fluid_adaptatif">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    </head>
    <body>
        <nav id="main-nav">
            <a id="toggle-nav" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul id="toggle-ul">
                <a href="#slide-competence" class="toggle-a"><li>Compétences</li></a>
                <a href="#slide-realisation" class="toggle-a"><li>Réalisations</li></a>
                <a href="#slide-experience" class="toggle-a"><li>Experiences</li></a>
                <a href="#slide-contact" class="toggle-a"><li>Contact</li></a>
            </ul>
        </nav>
        <main>
            <div id="slide1">
                <div class="slide_inside">
                    <div class="info">
                        <h1>Barbara Tousverts </h1>
                        <p>
                             Agée de 26 ans, je suis actuellement en formation de développement et d'intégration web depuis sept mois. <br>
                        </p>
                         <div class="phone">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>06.63.57.70.89</p>
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
                    <section id="skills">
                        <progress value="80" max="100"></progress><span>JavaScript/jQuery</span>
                        <progress value="70" max="100"></progress><span>HTML5/CSS3</span>
                        <progress value="60" max="100"></progress><span>NodeJS</span>
                        <progress value="70" max="100"></progress><span>Java/PHP</span>
                        <progress value="60" max="100"></progress><span>MySQL</span>
                        <progress value="80" max="100"></progress><span>Photoshop</span>
					</section>
                    
                </div>
               
            </div>
                
            </div>
            <div id="slide3">C</div>
            <div id="slide4"></div>
        </main>
            <footer>
                <p>Bas</p>
            </footer>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
