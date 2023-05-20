<?php

// *----------------------------------------------------------------------*
// *  PHP        : connexion.php                                          *
// *  Site       : Vroooom                                                *
// *  AUTEUR     : WALTER KARL                                            *
// *  DATE       : 20/03/2023                                             *
// *  DATE       :                                                        *
// *  BUT PAGE   : -------------------------------------------------------*
// *                                                                      *
// *  Page s'occupant de la création des tables ainsi que des fontions    *
// *  SQL utilisé pour les envoies de données                             *
// *----------------------------------------------------------------------*
// *  MODIFICATIONS                                                       *
// *                                                                      *
// *                                                                      *
// *----------------------------------------------------------------------*

// Connect to the database
$conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
// Show the client and server versions
//print_r(pg_version($conn));


// $sql = "

//         CREATE TABLE IF NOT EXISTS UsersWeb(
//         id SERIAL,
//         login VARCHAR(50),
//         motDePasse VARCHAR(50),
//         prenom VARCHAR(50),
//         nom VARCHAR(50),
//         PRIMARY KEY(id)
//     );
//     ";

$sql = "
    
    CREATE TABLE IF NOT EXISTS Clients(
        id SERIAL,
        nom VARCHAR(50),
        prenom VARCHAR(50),
        age INT,
        dateDeNaissance TIMESTAMP,
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
            FOREIGN KEY(id_1) REFERENCES societeExpert(id) ON DELETE CASCADE
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
            dateDebutLocation TIMESTAMP,
            dureeLocation INT,
            dateFinLocation TIMESTAMP,
            id_1 INT NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(id_1) REFERENCES Clients(id) ON DELETE CASCADE
            
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
            FOREIGN KEY(id_1) REFERENCES Expert(id) ON DELETE CASCADE,
            FOREIGN KEY(id_2) REFERENCES Garage(id) ON DELETE CASCADE,
            FOREIGN KEY(id_3) REFERENCES Clients(id) ON DELETE CASCADE
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
            FOREIGN KEY(idMarque) REFERENCES Marques(idMarque) ON DELETE CASCADE
        );   
        ";

$sql .= "
        
        CREATE TABLE IF NOT EXISTS Vehicule(
            plaque_d_immatriculation VARCHAR(50),
            couleur VARCHAR(50),
            Id INT NOT NULL,
            id_1 INT NOT NULL,
            PRIMARY KEY(plaque_d_immatriculation),
            FOREIGN KEY(Id) REFERENCES Location(Id) ON DELETE CASCADE,
            FOREIGN KEY(id_1) REFERENCES Modele(id) ON DELETE CASCADE
        );     
        ";

$sql .= "
        
        CREATE TABLE IF NOT EXISTS Dossier(
            id SERIAL,
            plaque_d_immatriculation VARCHAR(50) NOT NULL,
            PRIMARY KEY(id),
            UNIQUE(plaque_d_immatriculation),
            FOREIGN KEY(plaque_d_immatriculation) REFERENCES Vehicule(plaque_d_immatriculation) ON DELETE CASCADE
        );     
        ";

$sql .= "
        
        CREATE TABLE IF NOT EXISTS Piece(
            id SERIAL,
            piece VARCHAR(50),
            Description VARCHAR(50),
            lienPhoto text,
            id_1 INT NOT NULL,
            PRIMARY KEY(id),
            FOREIGN KEY(id_1) REFERENCES Dossier(id)         
        );        
        ";
// $sql .= "

//         CREATE TABLE IF NOT EXISTS Asso19(
//             id INT,
//             id_1 INT,
//             PRIMARY KEY(id, id_1),
//             FOREIGN KEY(id) REFERENCES Piece(id) ON DELETE CASCADE,
//             FOREIGN KEY(id_1) REFERENCES Dossier(id) ON DELETE CASCADE
//         );
//         ";

pg_query($conn, $sql);

// Ajout de données dans la table MARQUES
$test = "SELECT idmarque FROM marques WHERE id = 1";
$valid = pg_query($conn, $test);
$result = pg_fetch_row($valid)[0];
//print($result == "alfa Romeo");
if ($result != "alfa romeo") {
  $insert = "
    INSERT INTO marques (idmarque)
      VALUES ('alfa romeo');";
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

function insertSql($nomDeTable, $tableau)
{
  // Connect to the database
  $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
  // Show the client and server versions
  //print_r(pg_version($conn));

  $champs = "";
  $listeValues = "";
  foreach ($tableau as $nomChamp => $valeurs) {
    $champs .= $nomChamp;
    if (is_string($valeurs)) {
      $listeValues .= "'" . pg_escape_string($conn, trim($valeurs)) . "'";
    } else {
      $listeValues .= $valeurs;
    }
    if (next($tableau) !== false) {
      $champs .= ", ";
      $listeValues .= ", ";
    }
  }
  $nomDeTable = strtolower($nomDeTable);
  $champs = strtolower($champs);
  $listeValues = strtolower($listeValues);
  
  $sql = " INSERT INTO " . $nomDeTable . "(" . $champs . ") VALUES (" . $listeValues . ");";
  // var_dump($sql);
  pg_query($conn, $sql);
}

// Fonction permettant de Faire un Select avec condition sur n'importe quel table
function selectSql($table, $tableauCondition, $listeData)
{
  $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
  $data = "";
  $condition = "";

  foreach ($listeData as $col) {

    $data .= $col;

    if (next($listeData)) {
      $data .= ", ";
    }

  }

  foreach ($tableauCondition as $conditionTab => $valeur) {
    if (!is_numeric($valeur)) {
      $valeur = "'" . $valeur . "'";
      $condition .= $conditionTab . " LIKE " . $valeur;

    } else {
      $condition .= $conditionTab . " = " . $valeur;
    }

    if (next($tableauCondition)) {
      $condition .= " AND ";
    }
  }
  $data = strtolower($data);
  $table = strtolower($table);
  $condition = strtolower($condition);

  $sql = "SELECT " . $data . " FROM " . $table . " WHERE " . $condition . ";";

  // print($sql);

  return (pg_fetch_assoc(pg_query($conn, $sql)));
}


function tableSql($table)
{
  $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
  $sql = "SELECT * FROM " . $table . ";";

  return (pg_fetch_all(pg_query($conn, $sql)));
}

function justGoSql($requete)
{

  $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");

  return (pg_fetch_assoc(pg_query($conn, $requete)));

}

function tableSqlOrderById($table)
{

  $conn = pg_connect("host=db dbname=vroooom user=vroooom password=vroooom");
  $sql = "SELECT * FROM " . $table . " ORDER BY id DESC;";

  return (pg_fetch_all(pg_query($conn, $sql)));
}
?>