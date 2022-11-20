<?php


function update($id, $fieldName, $tableName, $data) {
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom", PGSQL_CONNECT_FORCE_NEW);
    
    if ($conn) {
        $escaptableName = pg_escape_string($conn, $tableName);
        $escapfieldName = pg_escape_string($conn, $fieldName);
        $escapdata = pg_escape_literal($conn, $data);
        $escapid = pg_escape_string($conn, $id);

        // $result = pg_prepare($conn, "UPDATE $1 SET $2=$3 WHERE id=$4");
        // $result = pg_execute($conn, array($escaptableName, $escapfieldName, $escapdata, $escapid));

        $sql = "UPDATE $escaptableName SET $escapfieldName=$escapdata WHERE id=$escapid";
        print($sql);
        pg_query($conn, $sql);
    } 
}

function delete($id, $tableName) {
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom", PGSQL_CONNECT_FORCE_NEW);

    if ($conn) {
        $escaptableName = pg_escape_string($conn, $tableName);
        $escapid = pg_escape_string($conn, $id);

        $sql = "DELETE FROM $escaptableName WHERE id=$escapid";
        print($sql);
        pg_query($conn, $sql);
    }
}

if(isset($_POST['todo'])) {
    if($_POST['todo'] == 'update') {
        update($_POST['id'], $_POST['fieldName'], $_POST['tableName'],$_POST['data']);
    } elseif($_POST['todo'] == 'delete') {
        delete($_POST['id'], $_POST['tableName']);
    }
}