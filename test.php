<?php 
function dataExpert($id){
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

echo(dataExpert(1));