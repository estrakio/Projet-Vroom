<?php
// Si la variable : nom, prenom, age, mail, numeroTelephone, dateDeNaissance, pays, ville, adresse, codePostal exisent alors echo
if (isset(
    $_GET['nom'],
    $_GET['prenom'],
    $_GET['adresseMail'],
    $_GET['numeroTelephone'],
    $_GET['login'],
    $_GET['motDePasse'],
    $_GET['societe']

)) {
    //echo "Nom : " . $_GET['nom'] . "</br>";
    //echo "Prénom : " . $_GET['prenom'] . "</br>";
    //echo "Mail : " . $_GET['adresseMail'] . "</br>";
    //echo "Numéro de téléphone : " . $_GET['numeroTelephone'] . "</br>";
    //echo "Login : " . $_GET['login'] . "</br>";
    //echo "Mot de passe : " . $_GET['motDePasse'] . "</br>";
    //echo $_GET['societe'];


    $tabCondition = array('nom' => $_GET['societe'],);
    $data = ["id"];
    //$idSociete = selectSql("societeExpert", $tabCondition, $data);



    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    $sql = "SELECT id FROM societeExpert WHERE nom = '" . $_GET['societe'] . "';";
    $idSociete = pg_fetch_assoc(pg_query($conn, $sql));





    $tabExpert = array(
        "nom" => $_GET['nom'],
        "prenom" => $_GET['prenom'],
        "adresseMail" => $_GET['adresseMail'],
        "numeroTelephone" => $_GET['numeroTelephone'],
        "login" => $_GET['login'],
        "motDePasse" => $_GET['motDePasse'],
        "id_1" => $idSociete['id'],
    );

    insertSql("expert", $tabExpert);

?>
    <div class="row text-center text-success">
        <p style="margin-top:5vh;"> Expert Ajouté ! </p>
    </div>

<?php
}
?>

<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=expert" method="get" id="formExpert">
            <input hidden value="expert" name="content" id="content">
            <br>
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom" required>
            </div>
            <br>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom" required>
            </div>
            <br>
            <div>
                <label for="adresseMail">Adresse email</label>
                <input class="form-control" placeholder="nom@exemple.com" name="adresseMail" required>
            </div>
            <br>
            <div>
                <label for="societe">Travail pour : </label>
                <select class="form-control" id="" name="societe">
                    <option disabled selected value>-- Select an option -- </option>
                    <?php
                    $societes = tableSql('societeexpert');
                    foreach ($societes as $champ => $data) {
                        echo ("<option>" . $data['nom'] . "</option>");
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                <label for="numeroTelephone">Numéro de téléphone</label>
                <input type="number" class="form-control" placeholder="Numéro de téléphone" name="numeroTelephone" required>
            </div>
            <br>
            <div>
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" required>
            </div>
            <br>
            <div>
                <label for="motDePasse">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="motDePasse" required>
            </div>
            <div class="text-center">
                <button class="btn btn-secondary btn-lg" type="submit" form="formExpert" value="Submit">Envoyer</button>
                <br><br>
            </div>
        </form>
    </div>
    <div class="col-3"></div>
</div>