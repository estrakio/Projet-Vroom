<?php
include_once("../connexion.php");

function expertConnect($login, $mdp){
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
    
    //echo("<pre>");
    //var_dump($test);
    //echo("</pre>");

}

function dataExpert($id){

    $tabCondition = array('id' => $id);

    $listeData = ['nom','prenom', 'login'];

    $data = selectSql("clients",$tabCondition,$listeData);
    $json_data = json_encode($data);
    return $json_data;
}

$id = "";
$login = "test";
$mdp = "testmdp";

if (isset($_POST["login"]) and isset($_POST["password"])) {
    
    echo(expertConnect($_POST["login"], $_POST["password"]));
}



