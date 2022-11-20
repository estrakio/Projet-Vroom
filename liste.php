<?php
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");

    
    function update($id, $fieldName, $tableName, $data) {
        $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
        
        $sql = "UPDATE $1 SET $2=$3 WHERE id=$4";
        print($sql);
        $result = pg_prepare($conn, "my_query", $sql);
        print($sql);
        $result = pg_execute($conn, "my_query", array($tableName, $fieldName, $data, $id));
        print($result);
        }

    //update(1, "nom", "client", "test");
    
        
    $fullfiche = "";

    $sql = "SELECT * FROM Clients ORDER by id ASC";
    $valid = pg_query($conn, $sql);
    $optClient = "<optgroup id='client' label='Clients'>";
    while ($clients = pg_fetch_assoc($valid)) {
        //var_dump($clients);
        $clientId = $clients['id'];
        $id = "clients"."z".strval($clientId);
        $$id = "<div id='fiche"."z".$id."' class='col-8 fiche desactiver'>
                    <br>
                    <b>Clients</b>
                    <br><br>
                    <div id='' class='champ row'>
                        <div id='' class='col-5'>Numéros Client: </div>
                        <div id='".$id."zid"."' class='col-7'>".$clients['id']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom: </div>
                        <div id='".$id."znom"."' class='col-7 modifiable titre'>".$clients['nom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Prenom: </div>
                        <div id='".$id."zprenom"."' class='col-7 modifiable'>".$clients['prenom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Age: </div>
                        <div id='".$id."zage"."' class='col-7 modifiable'>".$clients['age']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Date de naissance: </div>
                        <input type='date' id='".$id."zdatedenaissance"."' class='col-7' value='".$clients['datedenaissance']."' onChange='datelistener(this.id)'>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Numéro de Téléphone: </div>
                        <div id='".$id."znumerotelephone"."' class='col-7 modifiable'>".$clients['numerotelephone']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Email: </div>
                        <div id='".$id."zmail"."' class='col-7 modifiable'>".$clients['mail']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Adresse: </div>
                        <div id='".$id."zadresse"."' class='col-7 modifiable'>".$clients['adresse']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Ville: </div>
                        <div id='".$id."zville"."' class='col-7 modifiable'>".$clients['ville']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Code postal: </div>
                        <div id='".$id."zcodepostal"."' class='col-7 modifiable'>".$clients['codepostal']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Pays: </div>
                        <div id='".$id."zpays"."' class='col-7 modifiable'>".$clients['pays']."</div>                    
                    </div>
                    <br>
                </div>
                ";
        $fullfiche .= ${$id};
        $optClient .= "<option id='select".$id."' value='fiche"."z".$id."' >".$clients['nom']."</option>";
    }
    $optClient .= "</optgroup>";
     
    


    $sql = "SELECT * FROM Garage ORDER by id ASC";
    $valid = pg_query($conn, $sql);
    $optGarage = "<optgroup id='garage' label='Garages'>";
    while ($garage = pg_fetch_assoc($valid)) {
        //var_dump($garage);
        $garageId = $garage['id'];
        $id = "garage"."z".strval($garageId);
        $$id = "<div id='fiche"."z".$id."' class='col-8 fiche desactiver'>
                    <br>
                    <b>Garage</b>
                    <br><br>
                    <div id='' class='champ row'>
                        <div id='' class='col-5'>Numéros Client Garage: </div>
                        <div id='".$id."zid"."' class='col-7'>".$garage['id']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom du garage: </div>
                        <div id='".$id."znomdugarage"."' class='col-7 modifiable titre'>".$garage['nomdugarage']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom du propriétaire: </div>
                        <div id='".$id."znomduproprietaire"."' class='col-7 modifiable'>".$garage['nomduproprietaire']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Adresse: </div>
                        <div id='".$id."zadresse"."' class='col-7 modifiable'>".$garage['adresse']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Code postal: </div>
                        <div id='".$id."zcodepostal"."' class='col-7 modifiable'>".$garage['codepostal']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Ville: </div>
                        <div id='".$id."zville"."' class='col-7 modifiable'>".$garage['ville']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Pays: </div>
                        <div id='".$id."zpays"."' class='col-7 modifiable'>".$garage['pays']."</div>                    
                    </div>
                    <br>
                </div>
                ";
        $fullfiche .= ${$id};
        $optGarage .= "<option id='select".$id."' value='fiche"."z".$id."'>".$garage['nomdugarage']."</option>";
    }
    $optGarage .= "</optgroup>";


    $sql = "SELECT * FROM societeExpert ORDER by id ASC";
    $valid = pg_query($conn, $sql);
    $optSocieteExpert = "<optgroup id='societeExpert' label='Société Expert'>";
    while ($SocieteExpert = pg_fetch_assoc($valid)) {
        $SocieteExpertId = $SocieteExpert['id'];
        $id = "SocieteExpert"."z".strval($SocieteExpertId);
        $$id = "<div id='fiche"."z".$id."' class='col-8 fiche desactiver'>
                    <br>
                    <b>Société d'Expert</b>
                    <br><br>
                    <div id='' class='champ row'>
                        <div id='' class='col-5'>Numéros Client: </div>
                        <div id='".$id."zid"."' class='col-7 '>".$SocieteExpert['id']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom: </div>
                        <div id='".$id."znom"."' class='col-7 modifiable titre'>".$SocieteExpert['nom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Adresse: </div>
                        <div id='".$id."zadresse"."' class='col-7 modifiable'>".$SocieteExpert['adresse']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Code postal: </div>
                        <div id='".$id."zcodepostal"."' class='col-7 modifiable'>".$SocieteExpert['codepostal']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Numéro de Siret: </div>
                        <div id='".$id."znumerosiret"."' class='col-7 modifiable'>".$SocieteExpert['numerosiret']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Ville: </div>
                        <div id='".$id."zville"."' class='col-7 modifiable'>".$SocieteExpert['ville']."</div>                    
                    </div>
                    <br>
                </div>
                ";
        $fullfiche .= ${$id};
        $optSocieteExpert .= "<option id='select".$id."' value='fiche"."z".$id."'>".$SocieteExpert['nom']."</option>";
    }
    $optSocieteExpert .= "</optgroup>";


    $sql = "SELECT * FROM Expert ORDER by id ASC";
    $valid = pg_query($conn, $sql);
    $optExpert = "<optgroup id='expert' label='Expert'>";
    $expertId = 1;
    while ($expert = pg_fetch_assoc($valid)) {
        $expertId = $expert['id'];
        $id = "expert"."z".strval($expertId);
        $$id = "<div id='fiche"."z".$id."' class='col-8 fiche desactiver'>
                    <br>
                    <b>Expert</b>
                    <br><br>
                    <div id='' class='champ row'>
                        <div id='' class='col-5'>Numéros D'Expert: </div>
                        <div id='".$id."zid"."' class='col-7'>".$expert['id']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom: </div>
                        <div id='".$id."znom"."' class='col-7 modifiable titre'>".$expert['nom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Prenom: </div>
                        <div id='".$id."zprenom"."' class='col-7 modifiable'>".$expert['prenom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Login: </div>
                        <div id='".$id."zlogin"."' class='col-7 modifiable'>".$expert['login']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Adresse mail: </div>
                        <div id='".$id."zadressemail"."' class='col-7 modifiable'>".$expert['adressemail']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Mot de passe: </div>
                        <div id='".$id."zmotdepasse"."' class='col-7 modifiable'>".$expert['motdepasse']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Numéro de téléphone: </div>
                        <div id='".$id."znumerotelephone"."' class='col-7 modifiable'>".$expert['numerotelephone']."</div>                    
                    </div>
                    <br>
                </div>
                ";
        $fullfiche .= ${$id};
        $optExpert .= "<option class=ap".$expert['id_1']." id='select".$id."' value='fiche"."z".$id."'>".$expert['nom']."</option>";
        $expertId += 1;
    }
    $optExpert .= "</optgroup>";
    //var_dump($expert);


    $sql = "SELECT * FROM RendezVous ORDER by id ASC";
    $valid = pg_query($conn, $sql);
    $optRDV = "<optgroup id='rdv' label='Rendez-Vous'>";
    while ($rendezVous = pg_fetch_assoc($valid)) {
        $optRDV .= "<option>".$rendezVous['dateRdv']."</option>";
    }
    $optRDV .= "</optgroup>";
    //var_dump($rendezVous);


?>

<script>
    function update() {
        valeur = $("#first").val();
        //console.log("test");
        $("#second optgroup").hide();
        $("#second optgroup#"+valeur).show();
        //console.log(valeur);
        $(".fiche").removeClass("activer");
        $(".btnsupr").removeClass("acti");
        $("#footer ").removeClass("descend");
        $("#second").prop('selectedIndex',0);
    }

    function update2() {
        valeur = $("#second").val();
        $(".btnsupr").removeClass("acti");
        $(".fiche").removeClass("activer");
        $("#"+valeur).addClass("activer");
        $(".btnsupr").addClass("acti");
        
        
        $("#footer ").removeClass("descend");
        $("#footer ").addClass("descend");
        //console.log(valeur);
    }
</script>

<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="formulaire.php" method="GET">
        <br>
            <div>
                <label for="">Choisissez un champ:</label>
                <select class="form-control" id="first" onchange="update()">
                    <option disabled selected value> -- select an option -- </option>
                    <option value="client">Client</option>
                    <option value="garage">Garage</option>
                    <option value="expert">Expert</option>
                    <option value="societeExpert">société expert</option>
                    <option value="rdv">rendez-vous</option>
                </select>
            </div>
            <br>
            <div>
                <label for="">Choisissez: </label>
                <select class="form-control" id="second" onchange="update2()">
                    <option disabled selected value> -- select an option -- </option>
                    <?php echo ($optClient.$optGarage.$optExpert.$optSocieteExpert.$optRDV) ?>
                </select>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <?php  
        echo($fullfiche);
    ?>
</div>
<div class="row" style="position: relative; overflow:hidden;z-index: 0;">
    <div class="col-1 btnsupr">
        <b style="border-bottom: 2px solid;">Supprimer la fiche:</b>
        <div style="padding-top: 2vh;">
        <button class="btn btn-secondary btn-lg" style="height: 40px;" onclick="suprimerArticle()">Supprimer</button>
        </div>
    </div>
</div>

