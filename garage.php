<?php

// *----------------------------------------------------------------------*
// *  PHP        : garage.php                                             *
// *  Site       : Vroooom                                                *
// *  AUTEUR     : MOUSLI MATHIS                                          *
// *  DATE       : 20/03/2022                                             *
// *  DATE       :                                                        *
// *  BUT PAGE   : -------------------------------------------------------*
// *                                                                      *
// *  Formulaire de création Garage                                       *
// *  Le formulaire écrit des données sur les champs suivants de la       *
// *  table GARAGE :                                                      *
// *  - nomdugarage                                                       *
// *  - nomduproprietaire                                                 *
// *  - adresse                                                           *
// *  - codepostal                                                        *
// *  - ville                                                             *
// *  - pays                                                              *
// *----------------------------------------------------------------------*
// *  MODIFICATIONS                                                       *
// *                                                                      *
// *                                                                      *
// *----------------------------------------------------------------------*

if(!empty($_POST)){
    
    foreach ($_POST as $key => $value) {
        $value = pg_escape_string($conn, $value);
    }


    $tabGarage = array(
        "nomDuGarage" => $_POST['nomDuGarage'],
        "nomDuProprietaire" => $_POST['nomDuProprietaire'],
        "pays" => $_POST['pays'],
        "ville" => $_POST['ville'],
        "adresse" => $_POST['adresse'],
        "codePostal" => $_POST['codePostal'],
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
        <form action="/formulaire.php?content=garage" method="post" id="formGarage">
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





