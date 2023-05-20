<?php

if (!empty($_POST)) {
  // echo('<pre>');
  // var_dump($_POST);
  // echo('</pre>');
  foreach ($_POST as $key => $value) {
    $value = pg_escape_string($conn, $value);
  }


  $tabModele = array(
    'nommodele' => $_POST['nommodele'],
    'generation' => $_POST['generation'],
    'finition' => $_POST['finition'],
    'categorie' => $_POST['categorie'],
    'energie' => $_POST['energie'],
    'annee' => $_POST['annee'],
    'boitedevitesse' => $_POST['boitedevitesse'],
    'options' => $_POST['options'],
    'critair' => $_POST['critair'],
    'idmarque' => $_POST['idmarque'],
  );

  insertSql("modele", $tabModele);


  $clientListe = explode(" ", $_POST['client']);
  $tabCondition = array(
    'nom' => pg_escape_string($conn, $clientListe[0]),
    'prenom' => pg_escape_string($conn, $clientListe[1])
  );
  $listeData = ['id'];
  $idClient = selectSql("clients", $tabCondition, $listeData);

  $tabLocation = array(
    'datedebutlocation' => $_POST['datedebutlocation'],
    'dureelocation' => $_POST['dureelocation'],
    'datefinlocation' => $_POST['datefinlocation'],
    'id_1' => $idClient['id'],
  );
  insertSql("location", $tabLocation);

  $sqlIdLocation = "SELECT id FROM location WHERE datedebutlocation = " . "'" . strtolower($_POST['datedebutlocation']) . "'" . " AND dureelocation = " . "'" . strtolower($_POST['dureelocation']) . "'" . " ORDER BY id DESC LIMIT 1;";

  $idLocation = justGoSql($sqlIdLocation);
  $sqlIdModele = "SELECT id FROM modele WHERE nommodele = " . "'" . strtolower($_POST['nommodele']) . "'" . " AND generation = " . "'" . strtolower($_POST['generation']) . "'" . " ORDER BY id DESC LIMIT 1;";
  // print($sqlIdModele);
  $idModele = justGoSql($sqlIdModele);
  // var_dump($idModele);
  $tabVehicule = array(
    'plaque_d_immatriculation' => $_POST['plaque_d_immatriculation'],
    'couleur' => $_POST['couleur'],
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
    <form action="/formulaire.php?content=location" method="post" id="formLocation">
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