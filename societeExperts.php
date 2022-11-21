<?php

if (isset(
    $_GET['nom'],
    $_GET['ville'],
    $_GET['adresse'],
    $_GET['codepostal'],
    $_GET['numerosiret']
    ))
{
    $tabFinale = array('nom' => $_GET['nom'],
                        'adresse' => $_GET['adresse'],
                        'codepostal' => $_GET['codepostal'],
                        'numerosiret' => $_GET['numerosiret'],
                        'ville' => $_GET['ville'],
                        );
insertSql("societeexpert", $tabFinale);
?>

<div class="row text-center text-success">
    <b style="margin-top:5vh;"> Cabinet d'Expert Ajouté ! </b>
</div>

<?php

}
?>


<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=societeExperts" method="get" class="needs-validation" id="formSocieteExperts" novalidate>
        <input hidden value="societeExperts" name="content" id="content">
            <br>
            <div>
                <label for="nom">Nom du Cabinet : </label>
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
                <label for="codepostal">Code Postal</label>
                <input type="number" class="form-control" placeholder="Code Postal" name="codepostal" required>
            </div>
            <br>
            <div>
                <label for="numerosiret">Numéro Siret</label>
                <input type="number" class="form-control" placeholder="Numéro Siret" name="numerosiret" required>
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





