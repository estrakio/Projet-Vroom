<?php
include_once("../connexion.php");
function expertConnect($login, $mdp){
    $table = tableSql("Expert");
    $login_valid = "False";

    foreach ($table as $line) {
        if ($line["login"] == $login and $line["motdepasse"] == $mdp){
            $login_valid = "True";
            break;
        }
    }

    return $login_valid;
    
    //echo("<pre>");
    //var_dump($test);
    //echo("</pre>");

}


$login = "test";
$mdp = "testmdp";

if (isset($_POST["login"]) and isset($_POST["password"])) {
    
    echo(json_encode(array("login" => expertConnect($_POST["login"], $_POST["password"]))));
}



