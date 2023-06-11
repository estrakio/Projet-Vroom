
<?php
include_once("../connexion.php");

// Fonction Vérifiant si la plaque envoyé par l'application existe déjà dans la base de donnée
function testPlaqueDossier($plaque){
    $table = tableSql("Dossier");
    $already_created = false;

    foreach ($table as $line) {
        if ($line["plaque_d_immatriculation"] == $plaque){
            $already_created = true;
            break;
        }
    }
    return $already_created;
}

// Fonction créant un dossier pour la plaque envoyé par l'application
function create_dossier($plaque){

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $sql = "INSERT INTO dossier (plaque_d_immatriculation) VALUES ('$plaque') RETURNING id;";
    
    $result = pg_fetch_assoc(pg_query($conn, $sql));  

    $id_dossier = $result["id"];

    // echo $id_dossier;
    $dossier = json_decode($_POST["dossier"], true);
    // echo $dossier["list_expertise"];

    foreach ($dossier as $i => $expertise) {
        // var_dump($expertise);

        $img = $expertise['lienphoto'];
        // echo $img;
        // $img = base64_decode($img);
        // $img = pg_escape_bytea($conn, $img);
        // echo $img;
        // echo base64_encode($img);

        $id_expertise = pg_fetch_assoc(pg_query($conn, "INSERT INTO piece (piece, description, lienphoto, id_1) VALUES ('".$expertise['piece']."', '".$expertise['description']."', '$img', $id_dossier);"));
        //pg_query($conn, "INSERT INTO asso19 (id, id_1) VALUES ('$id_expertise', '$id_dossier');");

        // insertSql('asso19', array('id' => $id_expertise, 'id_1' => $id_dossier));
    }


    // echo("<pre>");
    // var_dump($dossier->{'list_expertise'});
    // echo("</pre>");

    // $tableau = array (  
    //     "plaque_d_immatriculation" => $result[0]["plaque_d_immatriculation"],
    //     "couleur" => $result[0]["couleur"],
    //     "nommodele" => $result[0]["nommodele"],
    //     "nom" => $result[0]["nom"],
    //     "prenom" => $result[0]["prenom"],
    //     "datedebutlocation" => $result[0]["datedebutlocation"],
    //     "dureelocation" => $result[0]["dureelocation"],
    //     "datefinlocation" => $result[0]["datefinlocation"],
    //     "idmarque" => $result[0]["idmarque"],
    // );
    
    // $json_data = json_encode($tableau);
    // return $tableau;
}

// fonction permettant de récupérer un dossier pour l'app mobile
function get_dossier($plaque) {
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $condition = "'".$plaque."'";
    $sql = "SELECT
            *
            FROM dossier
            LEFT JOIN piece
            ON  dossier.id = piece.id_1
            WHERE dossier.plaque_d_immatriculation = ".$condition.";";
    
    $result = pg_fetch_all(pg_query($conn, $sql));

    $envoi = [];
    foreach ($result as $expertise) {

        $ligne = array(
            "description" => $expertise["description"],
            "lienphoto" =>  $expertise["lienphoto"],
            "piece" => $expertise["piece"]
        );
        array_push($envoi,$ligne);

    }
    // $listExpertise = array("list_expertise" => $envoi);
    // $json = json_encode($listExpertise);
    // echo($json);

    return $envoi;
    //echo("<pre>");
    //var_dump($envoi);
    //echo("</pre>");
}

function updateData($plaque){

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $sql = "SELECT id FROM Dossier WHERE plaque_d_immatriculation = '".$plaque."';"; 
    
    $id_dossier = pg_fetch_assoc(pg_query($conn, $sql))['id'];


    // echo $id_dossier;
    $dossier = json_decode($_POST["dossier"], true);
    // echo $dossier["list_expertise"];

    foreach ($dossier as $i => $expertise) {
        // var_dump($expertise);


        $id_expertise = pg_fetch_assoc(pg_query($conn, "INSERT INTO piece (piece, description, lienphoto, id_1) VALUES ('".$expertise['piece']."', '".$expertise['description']."', '".$expertise['lienphoto']."', $id_dossier);"));

    }
}


if (isset($_POST["plaque"])){
    $already_created = testPlaqueDossier($_POST["plaque"]);

    // Si la plaque envoyé par l'app n'existe pas dans la base de donnée
    if(!$already_created){
        // Si l'app envoie un dossier
        if (isset($_POST["dossier"])){
            
            create_dossier($_POST["plaque"]);
            echo(json_encode(array( "state" => "success")));
        }else{
            echo(json_encode(array( "state" => "pas de dossier")));
        }
    } else {
        if (!isset($_POST["dossier"])) {
            $doss = get_dossier($_POST["plaque"]);
            echo (json_encode(array("state" => "get dossier", "dossier" => array("list_expertise" => $doss))));
        } else {
            updateData($_POST["plaque"]);
            echo(json_encode(array( "state" => "success")));
        }
    }
}



