<?php
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");

    $sql = "SELECT * FROM Clients";
    $valid = pg_query($conn, $sql);
    $optClient = "<optgroup id='client' label='Clients'>";
    while ($clients = pg_fetch_row($valid)) {
        $optClient .= "<option>".$clients['nom'].$clients['prenom']."</option>";
    }
    $optClient .= "</optgroup>";


    $sql = "SELECT * FROM Garage";
    $valid = pg_query($conn, $sql);
    $optGarage = "<optgroup id='garage' label='Garages'>";
    while ($garage = pg_fetch_row($valid)) {
        $optGarage .= "<option>".$garage['nom'].$garage['prenom']."</option>";
    }
    $optGarage .= "</optgroup>";


    $sql = "SELECT * FROM societeExpert";
    $valid = pg_query($conn, $sql);
    $optSocieteExpert = "<optgroup id='societeExpert' label='Société Expert'>";
    while ($expert = pg_fetch_row($valid)) {
        $optSocieteExpert .= "<option>".$expert['nom'].$expert['prenom']."</option>";
    }
    $optSocieteExpert .= "</optgroup>";


    $sql = "SELECT * FROM Expert";
    $valid = pg_query($conn, $sql);
    $expert = pg_fetch_row($valid);
    var_dump($expert);

    $sql = "SELECT * FROM RendezVous";
    $valid = pg_query($conn, $sql);
    $rendezVous = pg_fetch_row($valid);
    var_dump($rendezVous);


?>

<script>
    function update() {
        valeur = $("#champ").val();
        console.log("test");
        $("#test optgroup").hide();
        $("#test optgroup#"+valeur).show();
        console.log(valeur);
    }
</script>

<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="formulaire.php" method="GET">
        <br>
            <div>
                <label for="">Choisissez un champ:</label>
                <select class="form-control" id="champ" onchange="update()">
                    <option disabled selected value> -- select an option -- </option>
                    <option>client</option>
                    <option>rendez-vous</option>
                    <option>expert</option>
                    <option value="societeExpert">société expert</option>
                    <option>garage</option>
                </select>
            </div>
            <br>
            <div>
                <label for="">Choisissez: </label>
                <select class="form-control" id="test">
                    <option disabled selected value> -- select an option -- </option>
                    <?php echo ($optClient.$optSocieteExpert) ?>
                    <optgroup id="garage" label="garage">
                        <option>marque 3</option>
                        <option>marque 4</option>
                    </optgroup>
                </select>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>

