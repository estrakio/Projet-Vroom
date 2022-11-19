<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=location" method="get" id="formLocation">
        <input hidden value="location" name="content" id="content">
            <br>
            <div>
                <label for="dateDebutLocation">Début de la location</label>
                <input type="date" class="form-control" name="dateDebutLocation">
            </div>
            <br>
            <div>
                <label for="dureelocation">Durée de la location</label>
                <input type="text" class="form-control" name="dureelocation">
            </div> 
            <br>
            <div>
                <label for="dateFinLocation">Fin de la location</label>
                <input type="date" class="form-control" name="dateFinLocation">
            </div>
            <br>
            <div>
                <label for="marque">Marque de la voiture</label>
                <select class="form-control" name="marque">
                    <option>marque 1</option>
                    <option>marque 2</option>
                    <option>marque 3</option>
                    <option>marque 4</option>
                </select>
            </div>
            <br>
            <div>
                <label for="nomModele">Modèle de la voiture</label>
                <select class="form-control" name="nomModele">
                    <option>modele 1</option>
                    <option>modele 2</option>
                    <option>modele 3</option>
                    <option>modele 4</option>
                </select>
            </div>
            <br>
            <div>
                <label for="generation">Génération</label>
                <input type="number" class="form-control" name="generation">
            </div>
            <br>
            <div>
                <label for="finition">Finition</label>
                <input type="text" class="form-control" placeholder="Finition" name="finition" required>
            </div>
            <br>
            <div>
                <label for="categorie">Catégorie</label>
                <input type="text" class="form-control" placeholder="Catégorie" name="categorie" required>
            </div>
            <br>
            <div>
                <label for="energie">Energie</label>
                <input type="text" class="form-control" placeholder="Energie" name="energie" required>
            </div>
            <br>
            <div>
                <label for="annee">Année</label>
                <input type="date" class="form-control" name="annee" required>
            </div>
            <br>
            <div>
                <label for="boiteDeVitesse">Boite de vitesse</label>
                <input type="text" class="form-control" placeholder="Boite de vitesse" name="boiteDeVitesse" required>
            </div>
            <br>
            <div>
                <label for="options">Options</label>
                <input type="text" class="form-control" placeholder="Options" name="options" required>
            </div>
            <br>
            <div>
                <label for="critAir">Critères</label>
                <input type="text" class="form-control" placeholder="Critères" name="critAir" required>
            </div>
        </form>
        <br>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formLocation" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

if (isset(
    $_GET['dateDebutLocation'], 
    $_GET['dureelocation'],
    $_GET['dateFinLocation'],
    $_GET['marque'],
    $_GET['nomModele'],
    $_GET['generation'],
    $_GET['finition'],
    $_GET['categorie'],
    $_GET['energie'],
    $_GET['annee'],
    $_GET['boiteDeVitesse'],
    $_GET['options'],
    $_GET['critAir']
    ))
{
    echo "Début de la location : " . $_GET['dateDebutLocation'] . "</br>";
    echo "Durée de la location : " . $_GET['dureelocation'] . "</br>";
    echo "Fin de la location : " . $_GET['dateFinLocation'] . "</br>";
    echo "Marque de la voiture : " . $_GET['marque'] . "</br>";
    echo "Modèle de la voiture : " . $_GET['nomModele'] . "</br>";
    echo "Génération : " . $_GET['generation'] . "</br>";
    echo "Finition : " . $_GET['finition'] . "</br>";
    echo "Catégorie : " . $_GET['categorie'] . "</br>";
    echo "Energie : " . $_GET['energie'] . "</br>";
    echo "Année : " . $_GET['annee'] . "</br>";
    echo "Boite de vitesse : " . $_GET['boiteDeVitesse'] . "</br>";
    echo "Options : " . $_GET['options'] . "</br>";
    echo "Critères : " . $_GET['critAir'] . "</br>";

    include "location.php"; 
    $tabLocation = array(
        "dateDebutLocation" => $_GET['dateDebutLocation'],
        "dateFinLocation" => $_GET['dateFinLocation'],
        "marque" => $_GET['marque'],
        "nomModele" => $_GET['nomModele'],
        "generation" => $_GET['generation'],
        "finition" => $_GET['finition'],
        "categorie" => $_GET['categorie'],
        "energie" => $_GET['energie'],
        "annee" => $_GET['annee'],
        "boiteDeVitesse" => $_GET['boiteDeVitesse'], 
        "options" => $_GET['options'], 
        "critAir" => $_GET['critAir'],

    );

    insertSql("location", $tabLocation);

}

?>
