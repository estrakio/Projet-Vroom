<?php
include_once("../connexion.php");
function testPlaque($plaque){
    $table = tableSql("Vehicule");
    $plaque_valid = "False";

    foreach ($table as $line) {
        if ($line["plaque_d_immatriculation"] == $_POST["plaque"]){
            $plaque_valid = "True";
            break;
        }
    }
    return $plaque_valid;
}

function dataVehicule($plaque){

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $condition = "'".$plaque."'";
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

    
    $result = pg_fetch_all(pg_query($conn, $sql));

    //echo("<pre>");
    //var_dump($result);
    //echo("</pre>");

    $tableau = array ("dataVehicule" => "true",
                        "plaque_d_immatriculation" => $result[0]["plaque_d_immatriculation"],
                        "couleur" => $result[0]["couleur"],
                        "nommodele" => $result[0]["nommodele"],
                        "nom" => $result[0]["nom"],
                        "prenom" => $result[0]["prenom"],
                        "datedebutlocation" => $result[0]["datedebutlocation"],
                        "dureelocation" => $result[0]["dureelocation"],
                        "datefinlocation" => $result[0]["datefinlocation"],
                        "idmarque" => $result[0]["idmarque"],
    );
    $json_data = json_encode($tableau);
    return $json_data;
}

if (isset($_POST["plaque"])){
    
    $test = testPlaque($_POST["plaque"]);
    if($test === "True"){
        echo(dataVehicule($_POST["plaque"]));
    }
}



