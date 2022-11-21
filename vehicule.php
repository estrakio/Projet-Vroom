<?php

if (isset(
    $_GET['plaque_d_immatriculation']
)) {


    $tabCondition = array("plaque_d_immatriculation" => $_GET['plaque_d_immatriculation'],);
    $listeData = ["id",];
    $idVehicule = selectSql("vehicule", $tabCondition, $listeData);

    $tabCondition = array("id" =>  intval($idVehicule['id']),);
    $listeData = ["id_1",];
    $idClients = selectSql("location", $tabCondition, $listeData);

    tableauClient("clients", $idClients);
    tableauLocation("location", $tabCondition);
    $plaque = $_GET['plaque_d_immatriculation'];
    tableauVehicule("vehicule","modele", $plaque);

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



function tableauClient($table, $listeConditon)
{
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

        $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
        $sql = "SELECT * FROM " . $table . " WHERE id =".$listeConditon['id_1'].";";
        $requete = pg_fetch_all(pg_query($conn, $sql));

        echo ('<div class="row">');
        foreach ($requete  as $data) {
            echo ("<tr>");
            echo ("<td>" . $data['nom'] . "</td>");
            echo ("<td>" . $data['prenom'] . "</td>");
            echo ("<td>" . $data['age'] . "</td>");
            echo ("<td>" . $data["datedenaissance"] . "</td>");
            echo ("<td>" . $data["numerotelephone"] . "</td>");
            echo ("<td>" . $data["mail"] . "</td>");
            echo ("<td>" . $data["adresse"] . "</td>");
            echo ("<td>" . $data["ville"] . "</td>");
            echo ("<td>" . $data["codepostal"] . "</td>");
            echo ("<td>" . $data["pays"] . "</td>");
            echo ("</tr>");
        }
        echo ('</tbody>');
        echo ('</table>');
        echo('</div>');
        echo('</div>');
    }
// *************************************************************************************************
    function tableauLocation($table, $listeConditon)
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
                    <th scope="col">début de location :</th>
                    <th scope="col">mois de location :</th>
                    <th scope="col">Fin de location :</th>
                </tr>
            </thead>
    
            <tbody>
    
            <?php
    
            $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
            $sql = "SELECT * FROM " . $table . " WHERE id =".$listeConditon['id'].";";
            $requete = pg_fetch_all(pg_query($conn, $sql));
    
            echo ('<div class="row">');
            foreach ($requete  as $data) {
                echo ("<tr>");
                echo ("<td>" . $data['datedebutlocation'] . "</td>");
                echo ("<td>" . $data['dureelocation'] . "</td>");
                echo ("<td>" . $data['datefinlocation'] . "</td>");

            }
            echo ('</tbody>');
            echo ('</table>');
            echo('</div>');
            echo('</div>');
        }

// *************************************************************************************************
function tableauVehicule($tableVehicule, $tableModele, $plaque)
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
                <th scope="col">marque</th>
                <th scope="col">modele</th>
                <th scope="col">finition</th>
                <th scope="col">annee</th>
                <th scope="col">plaque d'immatriculation</th>

            </tr>
        </thead>

        <tbody>

        <?php
        $plaque = "'".$plaque."'";
        $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
        //$sql = "SELECT * FROM vehicule WHERE plaque_d_immatriculation = 'immatriculation' ;";
        $sql = "SELECT * FROM " . $tableVehicule . " WHERE plaque_d_immatriculation = ".$plaque." ;";
        $requeteVehicule = pg_fetch_all(pg_query($conn, $sql));
        
        $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
        
        $sql = "SELECT * FROM " . $tableModele . " WHERE id =".$requeteVehicule['id_1'].";";
        $requeteModele = pg_fetch_all(pg_query($conn, $sql));

        $tabData = array("plaque" =>  $requeteVehicule["plaque_d_immatriculation"],
                        "couleur" =>  $requeteVehicule["couleur"], 
                        "nommodele" =>  $requeteModele["nommodele"], 
                        "generation" =>  $requeteModele["generation"], 
                        "finition" =>  $requeteModele["finition"], 
                        "categorie" =>  $requeteModele["categorie"], 
                        "energie" =>  $requeteModele["energie"], 
                        "annee" =>  $requeteModele["annee"], 
                        "boitedevitesse" =>  $requeteModele["boitedevitesse"], 
                        "options" =>  $requeteModele["options"], 
                        "critair" =>  $requeteModele["critair"], 
                        "idmarque" =>  $requeteModele["idmarque"], 
                    
                    );

        echo ('<div class="row">');
            echo ("<tr>");
            echo ("<td>" . $tabData['marque'] . "</td>");
            echo ("<td>" . $tabData['modele'] . "</td>");
            echo ("<td>" . $tabData['finition'] . "</td>");
            echo ("<td>" . $tabData['annee'] . "</td>");
            echo ("<td>" . $tabData['plaque_d_immatriculation'] . "</td>");

        
        echo ('</tbody>');
        echo ('</table>');
        echo('</div>');
        echo('</div>');
    }
        ?>