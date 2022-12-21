<?php
include_once("../connexion.php");

$id = "";
$login = "test";
$mdp = "testmdp";

function expertConnect($login, $mdp){
    global $id;
    $table = tableSql("Expert");
    $login_valid = false;

    foreach ($table as $line) {
        if ($line["login"] == $login and $line["motdepasse"] == $mdp){
            $login_valid = true;
            $id = $line["id"];
            break;
        }
    }
    return $login_valid;
}

function getExpert($id){
    $tabCondition = array('id' => $id);
    $listeData = ['nom','prenom'];
    $data = selectSql("expert",$tabCondition,$listeData);
    $tableau = array (  
                        "nom" => $data["nom"],
                        "prenom" => $data["prenom"],
                    );

    // $json_data = json_encode($tableau);
    return $tableau;
}

if (isset($_POST["login"]) and isset($_POST["password"])) {
    
    $connection_valide = expertConnect($_POST["login"], $_POST["password"]);

    if($connection_valide){
        echo(json_encode(array( "login" => getExpert($id))));
    } else {
        echo(json_encode(array( "login" => "False")));
    }
}



