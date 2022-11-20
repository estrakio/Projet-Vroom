<?php
    // Page de test pour comprendre le format de données pour l'envoi via la fonction SQL 

    $clientListe = explode(" ", "rimmely ewan");
    $tabCondition = array('nom' => $clientListe[0],
                        'prenom' => $clientListe[1]);

    $listeData = ['id'];

    $donnes = selectSql("clients",$tabCondition,$listeData);

    echo("<pre>");
    var_dump($donnes);
    echo("</pre>");
    


?>