<?php

if (isset(
    $_GET['nomDuGarage'], 
    $_GET['nomDuProprietaire'],
    $_GET['pays'],
    $_GET['ville'],
    $_GET['adresse'],
    $_GET['codePostal']
    ))
{
    //echo "Nom du garage : " . $_GET['nomDuGarage'] . "</br>";
    //echo "Nom du proprietaire : " . $_GET['nomDuProprietaire'] . "</br>";
    //echo "Pays : " . $_GET['pays'] . "</br>";
    //echo "Ville : " . $_GET['ville'] . "</br>";
    //echo "Adresse : " . $_GET['adresse'] . "</br>";
    //echo "Code postal : " . $_GET['codePostal'] . "</br>";


    $tabGarage = array(
        "nomDuGarage" => $_GET['nomDuGarage'],
        "nomDuProprietaire" => $_GET['nomDuProprietaire'],
        "pays" => $_GET['pays'],
        "ville" => $_GET['ville'],
        "adresse" => $_GET['adresse'],
        "codePostal" => $_GET['codePostal'],
    );
    
    insertSql("garage", $tabGarage);

?>
<div class="row text-center text-success">
    <p style="margin-top:5vh;"> Garage Ajouté ! </p>
</div>

<?php
    }
?>

<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=garage" method="get" id="formGarage">
        <input hidden value="garage" name="content" id="content">
            <br>
            <div>
                <label for="nomDuGarage">Nom du garage</label>
                <input type="text" class="form-control" placeholder="Nom du garage" name="nomDuGarage" required>
            </div>
            <br>
            <div>
                <label for="nomDuProprietaire">Nom du propriétaire</label>
                <input type="text" class="form-control" placeholder="Nom du propriétaire" name="nomDuProprietaire" required>
            </div>
            <br>
            <div>
                <label for="pays">Pays</label>
                <input for="text "class="form-control" placeholder="Pays" name="pays" required>
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
            <div class="text-center">
                <button class="btn btn-secondary btn-lg" type="submit" form="formGarage" value="Submit">Envoyer</button>
                <br><br>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>





