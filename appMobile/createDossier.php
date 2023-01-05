
<?php
include_once("../connexion.php");
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
function create_dossier($plaque){

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $sql = "INSERT INTO dossier (plaque_d_immatriculation) VALUES ('$plaque') RETURNING id;";
    
    $result = pg_fetch_assoc(pg_query($conn, $sql));

    $id_dossier = $result["id"];

    // echo $id_dossier;
    $dossier = json_decode($_POST["dossier"], true);
    // echo $dossier["list_expertise"];

    foreach ($dossier['list_expertise'] as $i => $expertise) {
        // var_dump($expertise);

        $id_expertise = pg_fetch_assoc(pg_query($conn, "INSERT INTO piece (piece, description, lienphoto) VALUES ('".$expertise['piece']."', '".$expertise['description']."', '".$expertise['lienphoto']."') RETURNING id;"))['id'];
        pg_query($conn, "INSERT INTO asso19 (id, id_1) VALUES ('$id_expertise', '$id_dossier');");

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

function get_dossier($plaque) {
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $plaque = pg_escape_string($conn, $plaque);
    $condition = "'".$plaque."'";
    $sql = "SELECT
            *
            FROM dossier
            LEFT JOIN asso19
            ON  dossier.id = asso19.id_1
            LEFT JOIN piece
            ON asso19.id = piece.id
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
            $sql = "SELECT id FROM Dossier WHERE plaque_d_immatriculation = ".$plaque.";"; 
    
    $id_dossier = pg_fetch_assoc(pg_query($conn, $sql))['id'];


    // echo $id_dossier;
    $dossier = json_decode($_POST["dossier"], true);
    // echo $dossier["list_expertise"];

    foreach ($dossier['list_expertise'] as $i => $expertise) {
        // var_dump($expertise);

        $id_expertise = pg_fetch_assoc(pg_query($conn, "INSERT INTO piece (piece, description, lienphoto) VALUES ('".$expertise['piece']."', '".$expertise['description']."', '".$expertise['lienphoto']."') RETURNING id;"))['id'];
        pg_query($conn, "INSERT INTO asso19 (id, id_1) VALUES ('$id_expertise', '$id_dossier');");
    }
}


if (isset($_POST["plaque"])){
    $already_created = testPlaqueDossier($_POST["plaque"]);

    if(!$already_created){
        if (isset($_POST["dossier"])){
            create_dossier($_POST["plaque"]);
            echo(json_encode(array( "state" => "success")));
        }else{
            echo(json_encode(array( "state" => "pas de dossier")));
        }
    } else {
        if (!isset($_POST["dossier"])) {
            updateData($_POST["plaque"]);
            $doss = get_dossier($_POST["plaque"]);
            echo (json_encode(array("state" => "get dossier", "dossier" => array("list_expertise" => $doss))));
        }
    }
}



