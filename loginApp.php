<?php

function expertConnect($login, $mdp){
    $test = tableSql("Expert");
    $valid = 0;

    foreach ($test as $line) {
        if ($line["login"] == $login and $line["motdepasse"] == $mdp){
            $valid = 1;
            break;
        }
    }

    if ($valid === 1 ){
        return "true";
    }else{
        return "false";
    }
    
    //echo("<pre>");
    //var_dump($test);
    //echo("</pre>");

}


$login = "expert";
$mdp = "expert";

echo(expertConnect($login, $mdp));