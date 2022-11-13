<?php
    // Page de test pour comprendre le format de données pour l'envoi via la fonction SQL 

    include "connexion.php";

    $array = array(
        "nom" => "walter",
        "prenom" => "karl",
        "age" => 26,
        "datedenaissance" => "1996-07-25",
        "numerotelephone" => "0675537876",
        "mail" => "walterkarl@hotmail.fr",
        "adresse" => "6 rue saint michel",
        "ville" => "Saverne",
        "codepostal" => "67700",
        "pays" => "france", 
    );
    echo "<pre>";
    var_dump($array);
    echo "</pre>";

    insertSql("clients", $array);




?>