<?php
    // Page de test pour comprendre le format de données pour l'envoi via la fonction SQL 
    $a = "1112-11-11";
    $b = "12";

    $sqlIdLocation = "SELECT id FROM location WHERE datedebutlocation = "."'".$a."'"." AND dureelocation = "."'".$b."'"." ORDER BY id DESC LIMIT 1;";

    $idLocation = justGoSql($sqlIdLocation);

    echo("<pre>");
    var_dump($idLocation);
    echo("</pre>");
    


?>