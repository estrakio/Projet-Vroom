<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
    <form action="/formulaire.php?content=vehicule" method="get" id="formVehicule">
    <input hidden value="vehicule" name="content" id="content">
        <br>
            <div>
                <label for="">Plaque d'immatriculation</label>
                <input type="text" class="form-control" name = "immatriculation" required>
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formVehicule" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

if (isset(
    $_GET['immatriculation']
    ))
{
    echo "Plaque d'immatriculation : " . $_GET['immatriculation'];
}

$tabVehicule = array(
    "immatriculation" => $_GET['immatriculation'],
);

insertSql("vehicule", $tabVehicule);

?>