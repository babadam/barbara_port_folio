<body>
    <nav class="navbar navbar-inverse couleur"> <!--NAV-->
        <div class="container-fluid shadowNav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><?= $ligne_utilisateur['pseudo'] ?></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="realisations.php">Réalisations</a></li>
                        <li><a href="formations.php">Formations</a></li>
                        <li><a href="competences.php">Compétences</a></li>
                    </ul>

                     <!-- bouton déconnexion -->
                     <div class="nav navbar-nav navbar-right">
                         <ul class="nav navbar-nav">
                            <li><a href="messages.php">Messages</a></li>
                            <li><a class="navbar-brand" href="connexion.php?action=deconnexion"><span class="glyphicon glyphicon-off" aria-hidden="true"></a></li>
                        </ul>
                     </div>
                 </div>
             </div><!-- fin container fluid-->
        </nav>

    <section>
