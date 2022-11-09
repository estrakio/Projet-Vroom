<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=garage" method="get" id="formGarage">
        <input hidden value="garage" name="content" id="content">
            <br>
            <div>
                <label for="nomDuGarage">Nom du garage</label>
                <input type="text" class="form-control" placeholder="Nom du garage" name="nomDuGarage">
            </div>
            <br>
            <div>
                <label for="nomDuProprietaire">Nom du propriétaire</label>
                <input type="text" class="form-control" placeholder="Nom du propriétaire" name="nomDuProprietaire">
            </div>
            <br>
            <div>
                <label for="pays">Pays</label>
                <input for="text "class="form-control" placeholder="Pays" name="pays">
            </div>
            <br>
            <div>
                <label for="ville">Ville</label>
                <input type="text" class="form-control" placeholder="Ville" name="ville">
            </div>  
            <br>
            <div>
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" placeholder="Adresse" name="adresse">
            </div>  
            <br>
            <div>
                <label for="codePostal">Code Postal</label>
                <input type="number" class="form-control" placeholder="Code Postal" name="codePostal">
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formGarage" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

?>
