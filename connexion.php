<?php

// Connect to the database
$conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
// Show the client and server versions
//print_r(pg_version($conn));


$sql = "

    CREATE TABLE IF NOT EXISTS UsersWeb(
    id INT,
    login VARCHAR(50),
    motDePasse VARCHAR(50),
    prenom VARCHAR(50),
    nom VARCHAR(50),
    PRIMARY KEY(id)
    );
    ";

$sql .= "

    CREATE TABLE IF NOT EXISTS Clients(
        id INT,
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
        id INT,
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
        id INT,
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
        id INT,
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
        id INT,
        piece VARCHAR(50),
        Description VARCHAR(50),
        lienPhoto VARCHAR(50),
        PRIMARY KEY(id)
     );
          
      "; 

$sql .= "

      CREATE TABLE IF NOT EXISTS Marques(
        id INT,
        idMarque VARCHAR(50),
        PRIMARY KEY(idMarque)
    );         
    ";      

$sql .= "

    CREATE TABLE IF NOT EXISTS Location(
        id INT,
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
        id INT,
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
        id INT,
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
        id INT,
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