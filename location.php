<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=location" method="get" id="formLocation">
        <input hidden value="location" name="content" id="content">
            <br>
            <div>
                <label for="dateDebutLocation">Début de la location</label>
                <input type="date" class="form-control" name="dateDebutLocation">
            </div>
            <br>
            <div>
                <label for="dureelocation">Durée de la location</label>
                <input type="text" class="form-control" name="dureelocation">
            </div> 
            <br>
            <div>
                <label for="dateFinLocation">Fin de la location</label>
                <input type="date" class="form-control" name="dateFinLocation">
            </div>
            <br>
            <div>
                <label for="marque">Marque de la voiture</label>
                <select class="form-control" name="marque">
                    <option>marque 1</option>
                    <option>marque 2</option>
                    <option>marque 3</option>
                    <option>marque 4</option>
                </select>
            </div>
            <br>
            <div>
                <label for="nomModele">Modèle de la voiture</label>
                <select class="form-control" name="nomModele">
                    <option>modele 1</option>
                    <option>modele 2</option>
                    <option>modele 3</option>
                    <option>modele 4</option>
                </select>
            </div>
            <br>
            <div>
                <label for="generation">Génération</label>
                <input type="number" class="form-control" name="generation">
            </div>
            <br>
            <div>
                <label for="finition">Finition</label>
                <input type="text" class="form-control" placeholder="Finition" name="finition">
            </div>
            <br>
            <div>
                <label for="categorie">Catégorie</label>
                <input type="text" class="form-control" placeholder="Catégorie" name="categorie">
            </div>
            <br>
            <div>
                <label for="energie">Energie</label>
                <input type="text" class="form-control" placeholder="Energie" name="energie">
            </div>
            <br>
            <div>
                <label for="annee">Année</label>
                <input type="date" class="form-control" name="annee">
            </div>
            <br>
            <div>
                <label for="boiteDeVitesse">Boite de vitesse</label>
                <input type="text" class="form-control" placeholder="Boite de vitesse" name="boiteDeVitesse">
            </div>
            <br>
            <div>
                <label for="options">Options</label>
                <input type="text" class="form-control" placeholder="Options" name="options">
            </div>
            <br>
            <div>
                <label for="critAir">Critères</label>
                <input type="text" class="form-control" placeholder="Critères" name="critAir">
            </div>
        </form>
        <br>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formLocation" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<?php

?>
