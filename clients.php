<?php
// Si la variable : nom, prenom, age, mail, numeroTelephone, dateDeNaissance, pays, ville, adresse, codePostal exisent alors echo
if (isset(
    $_GET['nom'], 
    $_GET['prenom'],
    $_GET['age'],
    $_GET['mail'],
    $_GET['numeroTelephone'],
    $_GET['dateDeNaissance'],
    $_GET['pays'],
    $_GET['ville'],
    $_GET['adresse'],
    $_GET['codePostal']
    ))
{
    //echo "Nom : " . $_GET['nom'] . "</br>";
    //echo "Prénom : " . $_GET['prenom'] . "</br>";
    //echo "Age : " . $_GET['age'] . "</br>";
    //echo "Mail : " . $_GET['mail'] . "</br>";
    //echo "Numéro de téléphone : " . $_GET['numeroTelephone'] . "</br>";
    //echo "Date de naissance : " . $_GET['dateDeNaissance'] . "</br>";
    //echo "Pays : " . $_GET['pays'] . "</br>";
    //echo "Ville : " . $_GET['ville'] . "</br>";
    //echo "Adresse : " . $_GET['adresse'] . "</br>";
    //echo "Code Postal : " . $_GET['codePostal'] . "</br>";


    $tabClient = array(
        "nom" => $_GET['nom'],
        "prenom" => $_GET['prenom'],
        "age" => $_GET['age'],
        "datedenaissance" => $_GET['dateDeNaissance'],
        "numerotelephone" => $_GET['numeroTelephone'],
        "mail" => $_GET['mail'],
        "adresse" => $_GET['adresse'],
        "ville" => $_GET['ville'],
        "codepostal" => $_GET['codePostal'],
        "pays" => $_GET['pays'], 
    );

    insertSql("clients", $tabClient);
?>

<div class="row text-center text-success">
    <b style="margin-top:5vh;"> Clients Ajouté ! </b>
</div>

<?php
}

?>


<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=clients" method="get" id="formClients">
        <input hidden value="clients" name="content" id="content">
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
                <label for="age">Age</label>
                <input type="number" class="form-control" placeholder="Age" name="age" required>
            </div>
            <br>
            <div>
                <label for="mail">Adresse email</label>
                <input type="text" class="form-control" placeholder="nom@exemple.com" name="mail" required>
            </div>
            <br>
            <div>
                <label for="numeroTelephone">Numéro de téléphone</label>
                <input type="number" class="form-control" placeholder="Numéro de téléphone" name="numeroTelephone" required>
            </div> 
            <br>
            <div>
                <label for="dateDeNaissance">Date de naissance</label>
                <input type="date" class="form-control" name="dateDeNaissance" required>
            </div>
            <br>
            <div>
                <label for="pays">Pays</label>
                <input for="text "class="form-control" placeholder="Pays" name="pays" required>
            </div>
            <br>
            <div>
                <label for="ville">Ville</label>
                <input type="text" class="form-control" placeholder="Ville" name="ville" required>
            </div>  
            <br>
            <div>
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse" required>
            </div>  
            <br>
            <div>
                <label for="codePostal">Code Postal</label>
                <input type="number" class="form-control" placeholder="Code Postal" name="codePostal" required>
            </div> 
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formClients" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





