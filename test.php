<?php
    // Page de test pour comprendre le format de données pour l'envoi via la fonction SQL 
    $_GET['plaque_d_immatriculation'] = "boumboum";

    $condition = "'".$_GET['plaque_d_immatriculation']."'";
    $sql = "SELECT
            *
            FROM vehicule
            LEFT JOIN modele
            ON  vehicule.id_1 = modele.id
            LEFT JOIN location
            ON  vehicule.id = location.id
            LEFT JOIN clients
            ON  Location.id_1 = clients.id
            WHERE vehicule.plaque_d_immatriculation = ".$condition.";";

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    
    $result = pg_fetch_all(pg_query($conn, $sql));

    echo("<pre>");
    var_dump($result);
    echo("</pre>");
?>