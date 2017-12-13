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
        <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
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
                    <div class="competence front">
                        <h3 class="titre-front"><i class="fa fa-code" aria-hidden="true"></i>Intégration</h3>
                            <?php
                                for($i = 0; $i < count($ligne_competence); $i++ ){
                                    // echo '<pre style="color: black; background-color:white;">';
                                    // print_r($ligne_competence[$i]);
                                    // echo '</pre>';
                                    if($ligne_competence[$i]['categorie'] == 'dev_front'){
                                        echo '<p>';
                                        echo $ligne_competence[$i]['competence'];
                                         echo '</p>';
                                    }
                                }
                            ?>
                        
                    </div>
                        
                    <div class="competence dev">
                        <h3 class="titre-dev"><i class="fa fa-cogs" aria-hidden="true"></i>Développement</h3>
                              <?php
                                    for($i = 0; $i < count($ligne_competence); $i++ ){
                                        // echo '<pre style="color: black; background-color:white;">';
                                        // print_r($ligne_competence[$i]);
                                        // echo '</pre>';
                                        if($ligne_competence[$i]['categorie'] == 'dev_back'){
                                            echo '<p>';
                                            echo $ligne_competence[$i]['competence'];
                                            echo '</p>';
                                        }
                                    }
                                ?>
                    </div>
                        
                    
                    <div class="competence framework">
                        <h3 class="titre-framework"><i class="fa fa-plus-square" aria-hidden="true"></i>Framework</h3>
                              <?php
                                    for($i = 0; $i < count($ligne_competence); $i++ ){
                                        // echo '<pre style="color: black; background-color:white;">';
                                        // print_r($ligne_competence[$i]);
                                        // echo '</pre>';
                                        if($ligne_competence[$i]['categorie'] == 'framework'){
                                            echo '<p>';
                                            echo $ligne_competence[$i]['competence'];
                                            echo '</p>';
                                        }
                                    }
                                ?>
                    </div>
                    
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
