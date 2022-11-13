<?php
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");

    $sql = "SELECT * FROM Clients";
    $valid = pg_query($conn, $sql);
    $optClient = "<optgroup id='client' label='Clients'>";
    $clientId = 1;
    while ($clients = pg_fetch_assoc($valid)) {
        var_dump($clients);
        $id = "client"."z".strval($clientId);
        $$id = "<div id='fiche".$clientId."' class='col-8 fiche'>
                    <br>
                    <b>Clients</b>
                    <br><br>
                    <div id='' class='champ row'>
                        <div id='' class='col-5'>Numéros Client: </div>
                        <div id='".$id."zid"."' class='col-7'>".$clients['id']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Nom: </div>
                        <div id='".$id."znom"."' class='col-7'>".$clients['nom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Prenom: </div>
                        <div id='".$id."zprenom"."' class='col-7'>".$clients['prenom']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Age: </div>
                        <div id='".$id."zage"."' class='col-7'>".$clients['age']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Date de naissance: </div>
                        <div id='".$id."zdatedenaissance"."' class='col-7'>".$clients['datedenaissance']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Numéro de Téléphone: </div>
                        <div id='".$id."znumerotelephone"."' class='col-7'>".$clients['numerotelephone']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Email: </div>
                        <div id='".$id."zmail"."' class='col-7'>".$clients['mail']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Adresse: </div>
                        <div id='".$id."zadresse"."' class='col-7'>".$clients['adresse']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Ville: </div>
                        <div id='".$id."zville"."' class='col-7'>".$clients['ville']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Code postal: </div>
                        <div id='".$id."zcodepostal"."' class='col-7'>".$clients['codepostal']."</div>                    
                    </div>
                    <div id='' class='row champ'>
                        <div class='col-5'>Pays: </div>
                        <div id='".$id."zpays"."' class='col-7'>".$clients['pays']."</div>                    
                    </div>
                    <br>
                </div>
                ";
        $optClient .= "<option>".$clients['nom']."  ".$clients['prenom']."</option>";
        $clientId += 1;
    }
    $optClient .= "</optgroup>";
    


    $sql = "SELECT * FROM Garage";
    $valid = pg_query($conn, $sql);
    $optGarage = "<optgroup id='garage' label='Garages'>";
    while ($garage = pg_fetch_assoc($valid)) {
        //var_dump($garage);
        $optGarage .= "<option>".$garage['nomdugarage']."</option>";
    }
    $optGarage .= "</optgroup>";


    $sql = "SELECT * FROM societeExpert";
    $valid = pg_query($conn, $sql);
    $optSocieteExpert = "<optgroup id='societeExpert' label='Société Expert'>";
    while ($expert = pg_fetch_assoc($valid)) {
        $optSocieteExpert .= "<option>".$expert['nom']."</option>";
    }
    $optSocieteExpert .= "</optgroup>";


    $sql = "SELECT * FROM Expert";
    $valid = pg_query($conn, $sql);
    $optExpert = "<optgroup id='expert' label='Expert'>";
    while ($expert = pg_fetch_assoc($valid)) {
        $optExpert .= "<option>".$expert['nom']."  ".$expert['prenom']."</option>";
    }
    $optExpert .= "</optgroup>";
    //var_dump($expert);

    $sql = "SELECT * FROM RendezVous";
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
        console.log("test");
        $("#second optgroup").hide();
        $("#second optgroup#"+valeur).show();
        console.log(valeur);
        $("#fiche1").addClass("decal");
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
                <select class="form-control" id="second">
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
        echo($clientz1);
    ?>
</div>

