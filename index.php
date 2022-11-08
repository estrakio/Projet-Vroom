<html>
    <head>
        <title> Site de TEST </title>

        <!-- css necessaire pour Bootstrap -->
        <link rel="stylesheet" href="./bootstrap/5.1.2/css/bootstrap.min.css">
        
        <!--  Mon css perso pour inclure les polices de caracteres-->
        <link rel="stylesheet" href="./css/fonts.css">
        <link rel="stylesheet" href="./css/index.css">

        <!-- scripts necessaires pour bootstrap -->
        <script src="./bootstrap/5.1.2/js/bootstrap.bundle.min.js"></script>

        <!-- Jquery needed -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/scripts.js"></script>

    <!-- Function used to shrink nav bar removing paddings and adding black background -->
        <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 50) {
                    $('.nav').addClass('affix');
                    console.log("OK");
                } else {
                    $('.nav').removeClass('affix');
                }
            });
        </script>

    </head> 

    <body>
        <!-- DIV = Ce que je veux dépendant de ce que je met dedans  -->
        <nav class="nav">
            <div class="container">
                <div class="logo">
                    <a href="/index.php?content=accueil">Your Logo</a>
                </div>
                <div id="mainListDiv" class="main_list">
                    <ul class="navlinks">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
        </nav>
        <section class="home">
        </section>

    

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