<?php

if (isset(
    $_GET['plaque_d_immatriculation'],
    $_GET['garage'],
    $_GET['expert'],
    $_GET['dateRdv'],
    
    ))
{
    //echo("<pre>");
    //var_dump($_GET);
    //echo("</pre>");
    $expertListe = explode(" ", $_GET['expert']);
    $tabCondition = array("nom" => $expertListe[0],
                        "prenom" => $expertListe[1],
                    );
    $listeData = ["id",];
    $idExpert = selectSql("expert",$tabCondition,$listeData); 
    
    $tabCondition = array("nomdugarage" => $_GET['garage'],);
    $listeData = ["id",];
    $idGarage = selectSql("garage",$tabCondition,$listeData);
    
    $tabCondition = array("plaque_d_immatriculation" => $_GET['plaque_d_immatriculation'],);
    $listeData = ["id",];
    $idVehicule = selectSql("vehicule",$tabCondition,$listeData);

    $tabCondition = array("id" =>  intval($idVehicule['id']),);
    $listeData = ["id_1",];
    $idClients = selectSql("location",$tabCondition,$listeData);


    
    $tabFinale = array('daterdv' => $_GET['dateRdv'],
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
    ?>




<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=rendezVous" method="get" id="formRendezVous">
        <input hidden value="rendezVous" name="content" id="content">
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
            
            <div>
                <label for="garage">Sélectionnez le garage  : </label>
                <select class="form-control" id="" name="garage">
                    <option disabled selected value>-- Select an option -- </option>
                    <?php
                        $garage = tableSql('garage');
                        foreach ($garage as $champ => $garage) {
                            echo ("<option>" . $garage['nomdugarage'] ."</option>");
                        }
                    ?>
                </select>
            </div>
            <br>

            <div>
                <label for="expert">Sélectionnez l'expert  : </label>
                <select class="form-control" id="" name="expert">
                    <option disabled selected value>-- Select an option -- </option>
                    <?php
                        $expert = tableSql('expert');
                        foreach ($expert as $champ => $expert) {
                            echo ("<option>" . $expert['nom'] ." ". $expert['prenom'] ."</option>");
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

