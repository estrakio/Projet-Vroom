<?php

$conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
$sql = "SELECT * FROM piece;"; 

$liste_image = pg_fetch_all(pg_query($conn, $sql));

// var_dump($liste_image);

foreach ($liste_image as $image) {
    $image_b64 = $image["lienphoto"];
    echo '<img src="data:image/jpeg;base64,'.$image_b64.'" style="display: block; margin-left: auto; margin-right: auto; width: 500px;" />';
}
