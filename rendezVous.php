<?php

if (!empty($_POST)) {
  foreach ($_POST as $key => &$value) {
    $value = pg_escape_string($conn, $value);
  }
  // echo('<pre>');
  // var_dump($_POST);
  // echo('</pre>');

  $expertListe = explode(" ", $_POST['expert']);
  $tabCondition = array(
    "nom" => trim($expertListe[0]),
    "prenom" => trim($expertListe[1]),
  );
  $listeData = ["id",];
  $idExpert = selectSql("expert", $tabCondition, $listeData);

  $tabCondition = array("nomdugarage" => $_POST['garage'], );
  $listeData = ["id",];
  $idGarage = selectSql("garage", $tabCondition, $listeData);

  $tabCondition = array("plaque_d_immatriculation" => $_POST['plaque_d_immatriculation'], );
  $listeData = ["id",];
  $idVehicule = selectSql("vehicule", $tabCondition, $listeData);

  $tabCondition = array("id" => intval($idVehicule['id']), );
  $listeData = ["id_1",];
  $idClients = selectSql("location", $tabCondition, $listeData);

  $tabFinale = array(
    'daterdv' => $_POST['dateRdv'],
    'id_1' => $idExpert['id'],
    'id_2' => $idGarage['id'],
    'id_3' => $idClients['id_1'],
  );
  insertSql("rendezvous", $tabFinale);
  ?>

  <div class="row text-center text-success">
    <b style="margin-top:5vh;"> Prise de rendez-vous validé avec succés ! </b>
  </div>

  <?php
}
$sql = "SELECT
            *
            FROM vehicule
            LEFT JOIN modele
            ON  vehicule.id_1 = modele.id
            LEFT JOIN location
            ON  vehicule.id = location.id
            LEFT JOIN clients
            ON  Location.id_1 = clients.id;";
$conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
$result = pg_fetch_all(pg_query($conn, $sql));
?>

<div class="row">
  <div class="col-3 "></div>
  <div class="col-6">
    <form action="/formulaire.php?content=rendezVous" method="post" id="formRendezVous">
      <input hidden value="rendezVous" name="content" id="content">
      <br>
      <div>
        <label for="plaque_d_immatriculation">Sélectionnez le véhicule : </label>
        <select class="form-control" id="" name="plaque_d_immatriculation">
          <option disabled selected value>-- Select an option -- </option>
          <?php
          foreach ($result as $champ => $plaque) {
            echo ("<option value={$plaque['plaque_d_immatriculation']}>" . $plaque['plaque_d_immatriculation'] . " -- " . $plaque['nom'] . " " . $plaque['prenom'] . "</option>");
          }
          ?>
        </select>
      </div>
      <br>
      <div>
        <label for="garage">Sélectionnez le garage : </label>
        <select class="form-control" id="" name="garage">
          <option disabled selected value>-- Select an option -- </option>
          <?php
          $garage = tableSql('garage');
          foreach ($garage as $champ => $garage) {
            echo ("<option>" . $garage['nomdugarage'] . "</option>");
          }
          ?>
        </select>
      </div>
      <br>
      <div>
        <label for="expert">Sélectionnez l'expert : </label>
        <select class="form-control" id="" name="expert">
          <option disabled selected value>-- Select an option -- </option>
          <?php
          $expert = tableSql('expert');
          foreach ($expert as $champ => $expert) {
            echo ("<option>" . $expert['nom'] . " " . $expert['prenom'] . "</option>");
          }
          ?>
        </select>
      </div>
      <br>
      <div>
        <label for="dateRdv">Date du rendez-vous</label>
        <input type="date" class="form-control" name="dateRdv" required>
      </div>
      <br>
    </form>
    <div class="text-center">
      <button class="btn btn-secondary btn-lg" type="submit" form="formRendezVous" value="Submit">Envoyer</button>
      <br><br>
    </div>
  </div>
  <div class="col-3"></div>
</div>