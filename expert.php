<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=expert" method="get" id="formExpert">
        <input hidden value="expert" name="content" id="content">
            <br>
            <div>
                <label for="nom">Nom</label>
                <input type="text" class="form-control" placeholder="Nom" name="nom">
            </div>
            <br>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
            </div>
            <br>
            <div>
                <label for="adresseMail">Adresse email</label>
                <input class="form-control" placeholder="nom@exemple.com" name="adresseMail">
            </div>
            <br>
            <div>
                <label for="numeroTelephone">Numéro de téléphone</label>
                <input type="number" class="form-control" placeholder="Numéro de téléphone" name="numeroTelephone">
            </div>
            <br>
            <div>
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login">
            </div>
            <br>
            <div>
                <label for="motDePasse">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Mot de passe" name="motDePasse">
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formExpert" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

?>
