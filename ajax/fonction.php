<?php

function update() {
    $sql = "UPDATE article SET $fieldName=:contenu WHERE id=:id"; 
    $lien->prepare($sql)->execute([
        ':contenu' => $contenu,
        ':id' => $id,
    ]);
    }


if(isset($_POST['todo'])) {
    if($_POST['todo'] = "update") {
        //update_article($_POST['id_article'], $_POST['fieldName'], $_POST['data']);
    }
}