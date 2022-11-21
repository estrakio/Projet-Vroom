<?php

if (isset(
    $_GET['plaque_d_immatriculation']
)) {

    $condition = "'".$_GET['plaque_d_immatriculation']."'";
    $sql = "SELECT
            *
            FROM vehicule
            LEFT JOIN modele
            ON  vehicule.id_1 = modele.id
            LEFT JOIN location
            ON  vehicule.id = location.id
            LEFT JOIN clients
            ON  Location.id_1 = clients.id
            WHERE vehicule.plaque_d_immatriculation = ".$condition.";";

    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    
    $result = pg_fetch_all(pg_query($conn, $sql));



    tableauClient($result);
    tableauLocation($result);
    tableauVehicule($result);
    tableauDetail($result);

} else {

?>
    <div class="row">
        <div class="col-3 "></div>
        <div class="col-6">
            <form action="/formulaire.php?content=vehicule" method="get" id="formVehicule">
                <input hidden value="vehicule" name="content" id="content">
                <br>
                <div>
                    <label for="plaque_d_immatriculation">Sélectionnez le véhicule : </label>
                    <select class="form-control" id="" name="plaque_d_immatriculation">
                        <option disabled selected value>-- Select an option -- </option>
                        <?php
                        $vehicule = tableSql('vehicule');
                        foreach ($vehicule as $champ => $plaque) {
                            echo ("<option>" . $plaque['plaque_d_immatriculation'] . "</option>");
                        }
                        ?>
                    </select>
                </div>
                <br>
            </form>
            <div class="text-center">
                <button class="btn btn-secondary btn-lg" type="submit" form="formVehicule" value="Submit">Envoyer</button>
                <br><br>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
<?php
}



function tableauClient($data){
?>

<div class="row text-center  h3">
        <b style="margin-top:5vh;"> Client </b>
    </div>
<div class="row">
    <div>
    <table class="table table-striped table-dark h5">

        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Age</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Numero de telephone</th>
                <th scope="col">Mail</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Code postal</th>
                <th scope="col">Pays</th>
            </tr>
        </thead>

        <tbody>

        <?php


        echo ('<div class="row">');
        foreach ($data  as $champs => $val) {
            echo ("<tr>");
            echo ("<td>" . $val['nom'] . "</td>");
            echo ("<td>" . $val['prenom'] . "</td>");
            echo ("<td>" . $val['age'] . "</td>");
            echo ("<td>" . $val["datedenaissance"] . "</td>");
            echo ("<td>" . $val["numerotelephone"] . "</td>");
            echo ("<td>" . $val["mail"] . "</td>");
            echo ("<td>" . $val["adresse"] . "</td>");
            echo ("<td>" . $val["ville"] . "</td>");
            echo ("<td>" . $val["codepostal"] . "</td>");
            echo ("<td>" . $val["pays"] . "</td>");
            echo ("</tr>");
        }
        echo ('</tbody>');
        echo ('</table>');
        echo('</div>');
        echo('</div>');
    }
// *************************************************************************************************

function tableauLocation($data)
{
?>

<div class="row text-center  h3">
        <b style="margin-top:5vh;"> Location </b>
    </div>
<div class="row">
    <div>
    <table class="table table-striped table-dark h5">

        <thead class="thead-dark">
            <tr>
                <th scope="col">début de la location</th>
                <th scope="col">durée en mois</th>
                <th scope="col">fin de la location</th>
            </tr>
        </thead>

        <tbody>

        <?php


        echo ('<div class="row">');
        foreach ($data  as $champs => $val) {
            echo ("<tr>");
            echo ("<td>" . $val['datedebutlocation'] . "</td>");
            echo ("<td>" . $val['dureelocation'] . "</td>");
            echo ("<td>" . $val['datefinlocation'] . "</td>");

            echo ("</tr>");
        }
        echo ('</tbody>');
        echo ('</table>');
        echo('</div>');
        echo('</div>');
    }
// *************************************************************************************************
function tableauDetail($data){
    ?>
    
    <div class="row text-center  h3">
            <b style="margin-top:5vh;"> Détails </b>
        </div>
    <div class="row">
        <div>
        <table class="table table-striped table-dark h5">
    
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Année</th>
                    <th scope="col">Boite de vitesse</th>
                    <th scope="col">Options</th>
                    <th scope="col">Crit'Air</th>
                    <th scope="col">Génération</th>
                </tr>
            </thead>
    
            <tbody>
    
            <?php
    
    
            echo ('<div class="row">');
            foreach ($data  as $champs => $val) {
                echo ("<tr>");
                echo ("<td>" . $val['annee'] . "</td>");
                echo ("<td>" . $val['boitedevitesse'] . "</td>");
                echo ("<td>" . $val['options'] . "</td>");
                echo ("<td>" . $val['critair'] . "</td>");
                echo ("<td>" . $val['generation'] . "</td>");
                echo ("</tr>");
            }
            echo ('</tbody>');
            echo ('</table>');
            echo('</div>');
            echo('</div>');
        }
    // *************************************************************************************************

    function tableauVehicule($data){
        ?>
        
        <div class="row text-center  h3">
                <b style="margin-top:5vh;"> Véhicule </b>
            </div>
        <div class="row">
            <div>
            <table class="table table-striped table-dark h5">
        
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Plaque d'immatriculation</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Modèle</th>
                        <th scope="col">Couleur</th>
                        <th scope="col">Finition</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">énergie</th>
                    </tr>
                </thead>
        
                <tbody>
        
                <?php
        
        
                echo ('<div class="row">');
                foreach ($data  as $champs => $val) {
                    echo ("<tr>");
                    echo ("<td>" . $val['plaque_d_immatriculation'] . "</td>");
                    echo ("<td>" . $val['idmarque'] . "</td>");
                    echo ("<td>" . $val['nommodele'] . "</td>");
                    echo ("<td>" . $val['couleur'] . "</td>");
                    echo ("<td>" . $val['finition'] . "</td>");
                    echo ("<td>" . $val['categorie'] . "</td>");
                    echo ("<td>" . $val['energie'] . "</td>");
                    echo ("</tr>");
                }
                echo ('</tbody>');
                echo ('</table>');
                echo('</div>');
                echo('</div>');
            }
        // *************************************************************************************************
        ?>

