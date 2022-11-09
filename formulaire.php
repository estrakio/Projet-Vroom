<html>
    <head>
        <title> Site de TEST </title>

        <!-- css necessaire pour Bootstrap -->
        <link rel="stylesheet" href="./bootstrap/5.1.2/css/bootstrap.min.css">
        
        <!--  Mon css perso pour inclure les polices de caracteres-->
        <link rel="stylesheet" href="./css/fonts.css">
        <link rel="stylesheet" href="./css/formulaire.css">

        <!-- scripts necessaires pour bootstrap -->
        <script src="./bootstrap/5.1.2/js/bootstrap.bundle.min.js"></script>

        <!-- Jquery needed -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="./js/scripts.js"></script>


    </head> 

    <body>
        <!-- DIV = Ce que je veux dépendant de ce que je met dedans  -->
        
        <nav class="nav affix">
            <div class="container">
                <div class="logo">
                    <a href="/index.php?content=accueil">Accueil</a>
                </div>
                <div id="mainListDiv" class="main_list">
                    <ul class="navlinks clients">
                        <li class="clients"><a href="/formulaire.php?content=clients" class="clients">Clients</a></li>
                        <li><a href="/formulaire.php?content=garage">Garage</a></li>
                        <li><a href="/formulaire.php?content=expert">Expert</a></li>
                        <li><a href="/formulaire.php?content=location">Location</a></li>
                        <li><a href="/formulaire.php?content=rendezVous">Rendez-Vous</a></li>
                        <li><a href="/formulaire.php?content=societeExperts">Société expert</a></li>
                        <li><a href="/formulaire.php?content=vehicule">vehicule</a></li>
                    </ul>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
        </nav>
        


        <div id="content">

           <?php

            if (isset($_GET["content"])) {

                include $_GET["content"].".php";
            }
            else{
                include "accueil.php";
            }
           ?>

        </div>
        
        <div id="footer" class="row">

    </body>

</html>