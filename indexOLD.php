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

                    <div class="container-skillbar">
	                       <div class="skillbar clearfix " data-percent="70%">
		                       <div class="skillbar-title skillbar-title-html"><span>HTML5</span></div>
		                       <div class="skillbar-bar skillbar-bar-html"></div>
		                       <div class="skillbar-percent">70%</div>
	                       </div> <!-- Ende Skill Bar -->

	                       <div class="skillbar clearfix " data-percent="65%">
		                        <div class="skillbar-title skillbar-title-css"><span>CSS3</span></div>
		                        <div class="skillbar-bar skillbar-bar-css"></div>
		                        <div class="skillbar-percent">65%</div>
	                       </div> <!-- Ende Skill Bar -->

	                       <div class="skillbar clearfix " data-percent="25%">
		                        <div class="skillbar-title" style="background: #06A2CB;"><span>Js/jQuery</span></div>
		                        <div class="skillbar-bar" style="background: #06A2CB;"></div>
		                        <div class="skillbar-percent">25%</div>
	                       </div> <!-- Ende Skill Bar -->

	                       <div class="skillbar clearfix " data-percent="80%">
		                         <div class="skillbar-title" style="background: #218559;"><span>Photoshop</span></div>
		                         <div class="skillbar-bar" style="background: #218559;"></div>
		                        <div class="skillbar-percent">80%</div>
	                       </div> <!-- Ende Skill Bar -->

	                       <div class="skillbar clearfix " data-percent="85%">
		                         <div class="skillbar-title" style="background: #D0C6B1;"><span>Indesign</span></div>
		                         <div class="skillbar-bar" style="background: #D0C6B1;"></div>
		                         <div class="skillbar-percent">85%</div>
	                       </div> <!-- Ende Skill Bar -->

	                       <div class="skillbar clearfix " data-percent="75%">
		                         <div class="skillbar-title" style="background: #192823;"><span>Illustrator</span></div>
		                         <div class="skillbar-bar" style="background: #454545;"></div>
		                         <div class="skillbar-percent">75%</div>
	                       </div> <!-- Ende Skill Bar -->
                       </div><!-- Ende container Skill Bar -->
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
