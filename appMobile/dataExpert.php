<?php
include_once("../connexion.php");

$id = "";
$login = "test";
$mdp = "testmdp";

function expertConnect($login, $mdp){
    global $id;
    $table = tableSql("Expert");
    $login_valid = "False";

    foreach ($table as $line) {
        if ($line["login"] == $login and $line["motdepasse"] == $mdp){
            $login_valid = "True";
            $id = $line["id"];
            break;
        }
    }
    return $login_valid;
}

function getExpert($id){
    $tabCondition = array('id' => $id);
    $listeData = ['nom','prenom', 'login'];
    $data = selectSql("expert",$tabCondition,$listeData);
    $tableau = array ("dataExpert" => "true",
                        "nom" => $data["nom"],
                        "prenom" => $data["prenom"],
                        "login" => $data["login"],
    );
    $json_data = json_encode($tableau);
    return $json_data;
}

if (isset($_POST["login"]) and isset($_POST["password"])) {
    
    $test = expertConnect($_POST["login"], $_POST["password"]);
    if($test === "True"){
        echo(getExpert($id));
    }
}



