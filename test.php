<?php


// Créer des fiches imprimable de chaque table;

//echo (" <pre>");
//var_dump($_POST);
//echo ("</pre>");

if (isset($_POST["choix"])) {

    function test($tableData)
    {
        echo ("<pre>");
        var_dump($tableData);
        echo ("</pre>");
        foreach ($tableData  as $ligne) {
            foreach ($ligne  as $champ => $value) {
                //echo($champ);
                echo ("<tr>");
                echo ("<td>" . $value[$champ] . "</td>");
                echo ("</tr>");
            } 
        } 
    }

    function recupTable($table)
    {
        $tabData = tableSqlOrderById($table,'nom, prenom');
        return ($tabData);
    }

    function affichTable($tableData, $titre)
    {

?>

        <div class="row text-center  h3">
            <b style="margin-top:5vh;"><?php $titre ?></b>
        </div>
        <div class="row">
            <div>
                <table class="table table-striped table-dark h5">

                    <thead class="thead-dark">
                        <tr>
                            <?php
                            foreach ($tableData  as $ligne) {
                                if(next($tableData)){
                                }else{
                                    foreach ($ligne  as $champ => $value) {
                                        //echo($champ);
                                        echo ("<th scope='col'>".$champ."</th>");
                                    }
                                }    

                            } ?>
                        </tr>
                    </thead>

                    <tbody>

                <?php


                echo ('<div class="row">');
                foreach ($tableData  as $ligne) {
                    echo ("<tr>");
                    foreach ($ligne  as $champ => $value) {
                        //echo($champ);
                        echo ("<td>" . $value . "</td>");
                    } 
                    echo ("</tr>");
                } 
                echo ('</tbody>');
                echo ('</table>');
                echo ('</div>');
                echo ('</div>');
            }

            switch ($_POST["choix"]) {

                case 'clients':
                    # code...
                    $table = "clients";
                    $titre = "clients";
                    $tableData =  recupTable($table);
                    //test($tableData);
                    affichTable($tableData, $titre);
                    break;

                case 'garage':
                    # code...
                    $table = "garage";
                    $titre = 'garage';
                    $tableData =  recupTable($table);
                    affichTable($tableData, $titre);
                    break;

                case 'societe Expert':
                    # code...
                    $table = "societeexpert";
                    $titre = 'societe Expert';
                    $tableData =  recupTable($table);
                    affichTable($tableData, $titre);
                    break;

                case 'expert':
                    # code...
                    $table = "expert";
                    $titre = "expert";
                    $tableData =  recupTable($table);
                    affichTable($tableData, $titre);
                    break;

                default:
                    # code...
                    break;
            }
        }else{
                ?>
                <div class="row">
                    <div class="col-3 "></div>
                    <div class="col-6">
                        <form action="/formulaire.php?content=test" method="post" id="formChoix">
                            <input hidden value="choix" name="content" id="content">
                            <br>
                            <div>
                                <label for="choix">Sélectionnez la table à extraire : </label>
                                <select class="form-control" id="" name="choix">
                                    <option disabled selected value>-- Menu déroulant -- </option>
                                    <option>clients</option>
                                    <option>garage</option>
                                    <option>societe Expert</option>
                                    <option>expert</option>
                                </select>
                            </div>
                            <br>
                        </form>
                        <div class="text-center">
                            <button class="btn btn-secondary btn-lg" type="submit" form="formChoix" value="Submit">Envoyer</button>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-3">

                    </div>
                </div>

                <?php

        }

                ?>