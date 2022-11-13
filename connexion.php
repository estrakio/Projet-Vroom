<?php

    // Connect to the database
    $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
    // Show the client and server versions
    //print_r(pg_version($conn));


    $sql = "

        CREATE TABLE IF NOT EXISTS UsersWeb(
        id SERIAL,
        login VARCHAR(50),
        motDePasse VARCHAR(50),
        prenom VARCHAR(50),
        nom VARCHAR(50),
        PRIMARY KEY(id)
        );
        ";

    $sql .= "

        CREATE TABLE IF NOT EXISTS Clients(
            id SERIAL,
            nom VARCHAR(50),
            prenom VARCHAR(50),
            age INT,
            dateDeNaissance DATE,
            numeroTelephone VARCHAR(50),
            mail VARCHAR(50),
            adresse VARCHAR(50),
            ville VARCHAR(50),
            codePostal VARCHAR(50),
            pays VARCHAR(50),
            PRIMARY KEY(id)
         );
         ";

    $sql .= "

        CREATE TABLE IF NOT EXISTS Garage(
            id SERIAL,
            nomDuGarage VARCHAR(50),
            nomDuProprietaire VARCHAR(50),
            adresse VARCHAR(50),
            codePostal INT,
            ville VARCHAR(50),
            pays VARCHAR(50),
            PRIMARY KEY(id)
         );
         ";

    $sql .= "

        CREATE TABLE IF NOT EXISTS societeExpert(
            id SERIAL,
            nom VARCHAR(50),
            adresse VARCHAR(50),
            codePostal INT,
            numeroSiret VARCHAR(50),
            ville VARCHAR(50),
            PRIMARY KEY(id)
         );     
         ";

    $sql .= "

         CREATE TABLE IF NOT EXISTS Expert(
            id SERIAL,
            nom VARCHAR(50),
            prenom VARCHAR(50),
            login VARCHAR(50),
            adresseMail VARCHAR(50),
            motDePasse VARCHAR(50),
            numeroTelephone VARCHAR(50),
            id_1 INT NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(id_1) REFERENCES societeExpert(id)
         );
          ";     

    $sql .= "

         CREATE TABLE IF NOT EXISTS Piece(
            id SERIAL,
            piece VARCHAR(50),
            Description VARCHAR(50),
            lienPhoto VARCHAR(50),
            PRIMARY KEY(id)
         );

          "; 

    $sql .= "

          CREATE TABLE IF NOT EXISTS Marques(
            id SERIAL,
            idMarque VARCHAR(50),
            PRIMARY KEY(idMarque)
        );         
        ";      

    $sql .= "

        CREATE TABLE IF NOT EXISTS Location(
            id SERIAL,
            dateDebutLocation VARCHAR(50),
            dureeLocation VARCHAR(50),
            dateFinLocation VARCHAR(50),
            id_1 INT NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(id_1) REFERENCES Clients(id)

         );
        ";    
     
    $sql .= "

        CREATE TABLE IF NOT EXISTS RendezVous(
            id SERIAL,
            dateRdv VARCHAR(50),
            id_1 INT NOT NULL,
            id_2 INT NOT NULL,
            id_3 INT NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(id_1) REFERENCES Expert(id),
            FOREIGN KEY(id_2) REFERENCES Garage(id),
            FOREIGN KEY(id_3) REFERENCES Clients(id)
         );

        ";   

    $sql .= "

        CREATE TABLE IF NOT EXISTS Modele(
            id SERIAL,
            nomModele VARCHAR(50),
            generation VARCHAR(50),
            finition VARCHAR(50),
            categorie VARCHAR(50),
            energie VARCHAR(50),
            annee VARCHAR(50),
            boiteDeVitesse VARCHAR(50),
            options VARCHAR(50),
            critAir INT,
            idMarque VARCHAR(50) NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(idMarque) REFERENCES Marques(idMarque)
         );   
        ";   

    $sql .= "

        CREATE TABLE IF NOT EXISTS Vehicule(
            plaque_d_immatriculation VARCHAR(50),
            couleur VARCHAR(50),
            kilometrage VARCHAR(50),
            Id INT NOT NULL,
            id_1 INT NOT NULL,
            PRIMARY KEY(plaque_d_immatriculation),
            FOREIGN KEY(Id) REFERENCES Location(Id),
            FOREIGN KEY(id_1) REFERENCES Modele(id)
         );     
        ";    

    $sql .= "

        CREATE TABLE IF NOT EXISTS Dossier(
            id SERIAL,
            plaque_d_immatriculation VARCHAR(50) NOT NULL,
            PRIMARY KEY(id),
            UNIQUE(plaque_d_immatriculation),
            FOREIGN KEY(plaque_d_immatriculation) REFERENCES Vehicule(plaque_d_immatriculation)
         );     
        ";    
     
    $sql .= "

        CREATE TABLE IF NOT EXISTS Asso19(
            id INT,
            id_1 INT,
            PRIMARY KEY(id, id_1),
            FOREIGN KEY(id) REFERENCES Piece(id),
            FOREIGN KEY(id_1) REFERENCES Dossier(id)
         );
        ";  
     
    pg_query($conn, $sql);

// Ajout de données dans la table MARQUES
    $test = "SELECT idmarque FROM marques WHERE id = 1";
    $valid = pg_query($conn, $test);
    $result = pg_fetch_row($valid)[0];
    //print($result == "alfa Romeo");
    if ( $result != "alfa Romeo"){
        $insert = "
                    INSERT INTO marques (idmarque)
                        VALUES ('alfa Romeo');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('audi');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('bmw');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('citroen');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('dacia');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('fiat');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('mercedes-benz');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('peugeot');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('lexus');";
        $insert .= "
                    INSERT INTO marques (idmarque)
                        VALUES ('toyota');";
        pg_query($conn, $insert);
    }



// Ajout de données dans la TABLE CLIENTS
    $test = "SELECT nom FROM clients WHERE id = 1";
    $valid = pg_query($conn, $test);
    $result = pg_fetch_row($valid)[0];
    //print($result == "alfa Romeo");
    if ( $result != "mousli"){
        $insertClients = "
                    INSERT INTO clients (nom, prenom, age, datedenaissance, numerotelephone, mail, adresse, ville, codepostal, pays)
                        VALUES ('mousli', 'mathis', '20', '2000-08-23', '0606060606', 'waltermathis@hotmail.congo', '6 rue du pif', 'strasbourg', '60000', 'france');";
        $insertClients .= "
                    INSERT INTO clients (nom, prenom, age, datedenaissance, numerotelephone, mail, adresse, ville, codepostal, pays)
                        VALUES ('rimmely', 'ewan', '23', '2010-05-13', '0742132443', 'rimmelyEwan@hotmail.congo', '12 avenue du pif', 'paris', '42000', 'afrique');";
        
        pg_query($conn, $insertClients);
    }

// Ajout de données dans la TABLE SOCIETEEXPERT     
$test = "SELECT nom FROM societeexpert WHERE id = 1";
$valid = pg_query($conn, $test);
$result = pg_fetch_row($valid)[0];

if ( $result != "pedaie Societe"){
    $insertSociExpert = "
                INSERT INTO societeexpert (nom, adresse, codepostal, numerosiret, ville)
                    VALUES ('pedaie Societe', '6 avenue charles de gaulle', '67700', '12345678998765', 'Paris');";
    $insertSociExpert .= "
                INSERT INTO societeexpert (nom, adresse, codepostal, numerosiret, ville)
                    VALUES ('de la Faux entreprise', '6 route charles de hugo', '67700', '89987651234567', 'metz');";

    pg_query($conn, $insertSociExpert);
}

// Ajout de données dans la TABLE EXPERT     
    $test = "SELECT nom FROM expert WHERE id = 1 ";
    $valid = pg_query($conn, $test);
    $result = pg_fetch_row($valid)[0];

    if ( $result != "pedaie"){
        $insertExpert = "
                    INSERT INTO expert (nom, prenom, login, adressemail, motdepasse, numerotelephone, id_1)
                        VALUES ('pedaie', 'mathis', 'm.pedaie', 'pedaie-pro@hotmail.fr', 'bonjour123', '0388123432', '1');";
        $insertExpert .= "
                    INSERT INTO expert (nom, prenom, login, adressemail, motdepasse, numerotelephone, id_1)
                        VALUES ('de laFaux', 'bertrand', 'b.delafaux', 'delafaux-pro@gmail.fr', 'bonjour123', '0678123432', '1');";

        pg_query($conn, $insertExpert);
    }

// Ajout de données dans la TABLE GARAGE     
    $test = "SELECT nomdugarage FROM garage WHERE id = 1 ";
    $valid = pg_query($conn, $test);
    $result = pg_fetch_row($valid)[0];

    if ( $result != "otto mobile"){
        $insertExpert = "
                    INSERT INTO garage (nomdugarage, nomduproprietaire, adresse, codepostal, ville, pays)
                        VALUES ('otto mobile', 'mathis moustache', '4 rue du garage otto', '677123', 'Saverne', 'Allemagne');";
        $insertExpert .= "
                    INSERT INTO garage (nomdugarage, nomduproprietaire, adresse, codepostal, ville, pays)
                        VALUES ('moto toto', 'ewan salopette', '23 rue du grand moulin', '67000', 'Marseillle', 'Turquie');";

        pg_query($conn, $insertExpert);
    }

// Ajout de données dans la TABLE LOCATION
    $test = "SELECT datedebutlocation FROM location WHERE id = 1 ";
    $valid = pg_query($conn, $test);
    $result = pg_fetch_row($valid)[0];


    if ( $result != "2000-01-01"){
        $insertLocation = "
                    INSERT INTO location (dateDebutLocation, dureeLocation, dateFinLocation, id_1)
                        VALUES ('2000-01-01', '4 ans', '2004-01-01', 1 );";
        $insertLocation .= "
                    INSERT INTO location (dateDebutLocation, dureeLocation, dateFinLocation, id_1)
                        VALUES ('2003-01-01', '4 ans', '2007-01-01', 1 );";

        pg_query($conn, $insertLocation);
    }


    function insertSql($nomDeTable,$tableau){
        
        
        // Connect to the database
        $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
        // Show the client and server versions
        //print_r(pg_version($conn));

        $champs = "";
        $listeValues = "";
        foreach($tableau as $nomChamp => $valeurs){
            $champs .= $nomChamp;
            $listeValues .= "'".$valeurs."'";
            if ( next($tableau)){
                $champs .= ", ";
                $listeValues .= ", ";
            }
        }

        $sql = " INSERT INTO ".$nomDeTable."(".$champs.") VALUES (".$listeValues.");";
        pg_query($conn, $sql);
    }


    function update() {
        
    }
?>