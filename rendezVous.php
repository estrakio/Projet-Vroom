<div class="row">
    <div class="col-3 "></div>
    <div class="col-6">
        <form action="/formulaire.php?content=rendezVous" method="get" id="formRendezVous">
        <input hidden value="rendezVous" name="content" id="content">
        <br>
            <div>
                <label for="dateRdv">Date du rendez-vous</label>
                <input type="date" class="form-control" name="dateRdv">
            </div>
        </form>
        <div class="text-center">
            <button class="btn btn-secondary btn-lg" type="submit" form="formRendezVous" value="Submit">Envoyer</button>
            <br><br>
        </div>
    </div>
    <div class="col-3"></div>
</div>