<?php
    // Page de test pour comprendre le format de données pour l'envoi via la fonction SQL 
    $tableVehicule = "vehicule";
    $plaque ="immatriculation";

    $sql = "SELECT * FROM " . $tableVehicule . " WHERE plaque_d_immatriculation = ".$plaque." ;";
    $requeteVehicule = pg_fetch_all(pg_query($conn, $sql));

    //    $sql = "SELECT * FROM vehicule WHERE plaque_d_immatriculation = 'immatriculation' ;";
    $requeteVehicule = pg_fetch_all(pg_query($conn, $sql));


    echo("<pre>");
    var_dump($requeteVehicule);
    echo("</pre>");
    


?>