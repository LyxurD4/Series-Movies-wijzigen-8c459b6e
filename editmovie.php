<?php
//connectie
$host="localhost";
$db = "netland";
$username = "root";
$password = "";

$dsn= "mysql:host=$host;dbname=$db";
try {
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $username, $password);
    
    // display a message if connected to database successfully
    if ($conn) {
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Data uit de POST array vissen
    $titelWijzigenVar = $_POST["titelWijzigen"];
    $duurwijzigenVar = $_POST["duurWijzigen"];
    $datumVanUitkomstWijzigenVar = $_POST["datumVanUitkomstWijzigen"];
    $trailerWijzigenVar = $_POST["trailerWijzigen"];

    // UPDATE query 
    $conn->query(
        "UPDATE films 
        SET titel = '$titelWijzigenVar', 
        duur = $duurwijzigenVar, 
        datum_van_uitkomst = '$datumVanUitkomstWijzigenVar', 
        trailer = '$trailerWijzigenVar' 
        WHERE id = $id"
    );
}

header("Refresh: 2; url=films.php?id=$id");
exit("You are being redirected from editmovie.php...");

