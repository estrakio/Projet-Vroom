<?php

// *----------------------------------------------------------------------*
// *  PHP        : clients.php                                            *
// *  Site       : Vroooom                                                *
// *  AUTEUR     : MOUSLI MATHIS                                          *
// *  DATE       : 20/03/2022                                             *
// *  DATE       :                                                        *
// *  BUT PAGE   : -------------------------------------------------------*
// *                                                                      *
// *  Formulaire de création Clients                                      *
// *  Le formulaire écrit des données sur les champs suivants de la       *
// *  table  CLIENTS                                                      *
// *  - nom                                                               *
// *  - prenom                                                            *
// *  - age                                                               *
// *  - datedenaissance                                                   *
// *  - numerotelephone                                                   *
// *  - mail                                                              *
// *  - adresse                                                           *
// *  - ville                                                             *
// *  - codepostal                                                        *
// *  - pays                                                              *
// *----------------------------------------------------------------------*
// *  MODIFICATIONS                                                       *
// *                                                                      *
// *                                                                      *
// *----------------------------------------------------------------------*



// echo('<div>');
// var_dump($_POST);
// echo('</div>');


if(!empty($_POST)){

    foreach ($_POST as $key => &$value) {
        $value = pg_escape_string($conn, $value);
    }

    $tabClient = array(
        "nom" => $_POST['nom'],
        "prenom" => $_POST['prenom'],
        "age" => $_POST['age'],
        "datedenaissance" => $_POST['dateDeNaissance'],
        "numerotelephone" => $_POST['numeroTelephone'],
        "mail" => $_POST['mail'],
        "adresse" => $_POST['adresse'],
        "ville" => $_POST['ville'],
        "codepostal" => $_POST['codePostal'],
        "pays" => $_POST['pays'], 
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
        <form action="/formulaire.php?content=clients" method="post" id="formClients">
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





