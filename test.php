<?php


$image = base64_decode($image_b64);

$conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
$sql = "SELECT * FROM piece;"; 

$liste_image = pg_fetch_assoc(pg_query($conn, $sql));

foreach ($liste_image as $image) {
    $image_b64 = $image["lienphoto"];    
    ?>
<img src="data:image/png;base64,<?php echo $image_b64; ?>" alt="Mon image">
    <?php
}
