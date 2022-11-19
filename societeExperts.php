<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=societeExperts" method="get" class="needs-validation" id="formSocieteExperts" novalidate>
        <input hidden value="societeExperts" name="content" id="content">
            <br>
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom" required>
            </div>
            <br>
            <div>
                <label for="ville">Ville</label>
                <input type="text" class="form-control" placeholder="Ville" name="ville" required>
            </div>
            <br>
            <div>
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse" required>
            </div>
            <br>
            <div>
                <label for="codePostal">Code Postal</label>
                <input type="number" class="form-control" placeholder="Code Postal" name="codePostal" required>
            </div>
            <br>
            <div>
                <label for="numeroSiret">Numéro Siret</label>
                <input type="number" class="form-control" placeholder="Numéro Siret" name="numeroSiret" required>
            </div>
            <br>
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formSocieteExperts" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

if (isset(
    $_GET['nom'],
    $_GET['ville'],
    $_GET['adresse'],
    $_GET['codePostal'],
    $_GET['numeroSiret']
    ))
{
    echo "Nom : " . $_GET['nom'] . "</br>";
    echo "Ville : " . $_GET['ville'] . "</br>";
    echo "Adresse : " . $_GET['adresse'] . "</br>";
    echo "Code Postal : " . $_GET['codePostal'] . "</br>";
    echo "Numéro Siret : " . $_GET['numeroSiret'] . "</br>";
}

include "SocieteExperts.php"; 
$tabSocieteExperts = array(
    "nom" => $_GET['nom'],
    "ville" => $_GET['ville'],
    "adresse" => $_GET['adresse'],
    "codePostal" => $_GET['codePostal'],
    "numeroSiret" => $_GET['numeroSiret'],
);

insertSql("societeExperts", $tabSocieteExperts);

?>
