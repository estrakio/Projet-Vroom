<?php

if (isset(
    $_GET['client'],
    $_GET['plaque_d_immatriculation'],
    $_GET['datedebutlocation'],
    $_GET['dureelocation'],
    $_GET['datefinlocation'],
    $_GET['idmarque'],
    $_GET['nommodele'],
    $_GET['generation'],
    $_GET['finition'],
    $_GET['couleur'],
    $_GET['categorie'],
    $_GET['energie'],
    $_GET['annee'],
    $_GET['boitedevitesse'],
    $_GET['options'],
    $_GET['critair']
)) 

{

    $_GET['client'] = pg_escape_string($conn, $_GET['client']);
    $_GET['plaque_d_immatriculation'] = pg_escape_string($conn, $_GET['plaque_d_immatriculation']);
    $_GET['datedebutlocation'] = pg_escape_string($conn, $_GET['datedebutlocation']);
    $_GET['dureelocation'] = pg_escape_string($conn, $_GET['dureelocation']);
    $_GET['datefinlocation'] = pg_escape_string($conn, $_GET['datefinlocation']);
    $_GET['idmarque'] = pg_escape_string($conn, $_GET['idmarque']);
    $_GET['nommodele'] = pg_escape_string($conn, $_GET['nommodele']);
    $_GET['generation'] = pg_escape_string($conn, $_GET['generation']);
    $_GET['finition'] = pg_escape_string($conn, $_GET['finition']);
    $_GET['couleur'] = pg_escape_string($conn, $_GET['couleur']);
    $_GET['categorie'] = pg_escape_string($conn, $_GET['categorie']);
    $_GET['energie'] = pg_escape_string($conn, $_GET['energie']);
    $_GET['annee'] = pg_escape_string($conn, $_GET['annee']);
    $_GET['boitedevitesse'] = pg_escape_string($conn, $_GET['boitedevitesse']);
    $_GET['options'] = pg_escape_string($conn, $_GET['options']);
    $_GET['critair'] = pg_escape_string($conn, $_GET['critair']);

    $tabModele = array(
        'nommodele' =>      $_GET['nommodele'],
        'generation' =>     $_GET['generation'],
        'finition' =>       $_GET['finition'],
        'categorie' =>      $_GET['categorie'],
        'energie' =>        $_GET['energie'],
        'annee' =>          $_GET['annee'],
        'boitedevitesse' => $_GET['boitedevitesse'],
        'options' =>        $_GET['options'],
        'critair' =>        $_GET['critair'],
        'idmarque' =>       $_GET['idmarque'],
    );

    insertSql("modele", $tabModele);


    $clientListe = explode(" ", $_GET['client']);
    $tabCondition = array('nom' => $clientListe[0],
                        'prenom' => $clientListe[1]);

    $listeData = ['id'];

    $idClient = selectSql("clients",$tabCondition,$listeData);
    $tabLocation = array(
        'datedebutlocation' =>      $_GET['datedebutlocation'],
        'dureelocation' =>          $_GET['dureelocation'],
        'datefinlocation' =>        $_GET['datefinlocation'],
        'id_1' =>                   $idClient['id'],
    );
    insertSql("location", $tabLocation);
    sleep(1);
    $sqlIdLocation = "SELECT id FROM location WHERE datedebutlocation = "."'".$_GET['datedebutlocation']."'"." AND dureelocation = "."'".$_GET['dureelocation']."'"." ORDER BY id DESC LIMIT 1;";

    $idLocation = justGoSql($sqlIdLocation);
    sleep(1);
    $sqlIdModele = "SELECT id FROM modele WHERE nommodele = "."'".$_GET['nommodele']."'"." AND generation = "."'".$_GET['generation']."'"." ORDER BY id DESC LIMIT 1;";

    $idModele = justGoSql($sqlIdModele);
    sleep(1);
    $tabVehicule = array(
        'plaque_d_immatriculation' => $_GET['plaque_d_immatriculation'],
        'couleur' => $_GET['couleur'],
        'id' => $idLocation['id'],
        'id_1' => $idModele['id'],  
    );
    
    insertSql("vehicule", $tabVehicule);
    ?>

    <div class="row text-center text-success">
        <b style="margin-top:5vh;"> Location crée avec succés ! </b>
    </div>
    
<?php
    }

?>


<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=location" method="get" id="formLocation">
            <input hidden value="location" name="content" id="content">
            <br>
            <div>
                <label for="client">location attribué à : </label>
                <select class="form-control" id="" name="client">
                    <option disabled selected value>-- Select an option -- </option>
                    <?php
                    $clients = tableSql('clients');
                    foreach ($clients as $champ => $data) {
                        echo ("<option>" . $data['nom'] . " " . $data['prenom'] . "</option>");
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                <label for="plaque_d_immatriculation">Plaque d'immatriculation</label>
                <input type="text" class="form-control" name="plaque_d_immatriculation" required>
            </div>
            <br>
            <div>
                <label for="datedebutlocation">Début de la location</label>
                <input type="date" class="form-control" name="datedebutlocation">
            </div>
            <br>
            <div>
                <label for="dureelocation">Durée de la location (en mois)</label>
                <input type="number" class="form-control" name="dureelocation">
            </div>
            <br>
            <div>
                <label for="datefinlocation">Fin de la location</label>
                <input type="date" class="form-control" name="datefinlocation">
            </div>
            <br>
            <div>
                <label for="idmarque">Marque du véhicule : </label>
                <select class="form-control" id="" name="idmarque">
                    <option disabled selected value>-- Select an option -- </option>
                    <?php
                    $societes = tableSql('marques');
                    foreach ($societes as $champ => $data) {
                        echo ("<option>" . $data['idmarque'] . "</option>");
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                <label for="nommodele">Modèle du véhicule</label>
                <input type="text" class="form-control" name="nommodele">
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
                <label for="couleur">Couleur du véhicule</label>
                <input type="text" class="form-control" name="couleur">
            </div>
            <br>
            <div>
                <label for="categorie">Catégorie</label>
                <input type="text" class="form-control" placeholder="Catégorie" name="categorie" required>
            </div>
            <br>
            <div>
                <label for="energie">Energie</label>
                <select class="form-control" name="energie">
                    <option disabled selected value>-- Select an option -- </option>
                    <option>essence</option>
                    <option>diesel</option>
                    <option>electrique</option>
                    <option>hybride</option>
                </select>
            </div>
            <br>
            <div>
                <label for="annee">Année</label>
                <input type="date" class="form-control" name="annee" required>
            </div>
            <br>
            <div>
                <label for="boitedevitesse">Boite de vitesse</label>
                <select class="form-control" name="boitedevitesse">
                    <option disabled selected value>-- Select an option -- </option>
                    <option>manuel</option>
                    <option>automatique</option>
                </select>
            </div>
            <br>
            <div>
                <label for="options">Options</label>
                <input type="text" class="form-control" placeholder="Options" name="options" required>
            </div>
            <br>
            <div>
                <label for="critair">Crit'Air</label>
                <select class="form-control" name="critair">
                    <option disabled selected value>-- Select an option -- </option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
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