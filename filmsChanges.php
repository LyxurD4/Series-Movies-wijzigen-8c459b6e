<?php

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
        echo "Connected to the <strong>$db</strong> database successfully!";
    }
} catch (PDOException $e) {
    // report error message
    echo $e->getMessage();
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $informatie = $conn->query("select * from films where id = $id");
}

if (isset($_POST["wijziging"])) {
    if (isset($_POST["titelWijzigen"])) {
        $titelWijzigenVar = $_POST["titelWijzigen"];
        $titelWijzigen = $conn->query("UPDATE films SET titel = $titelWijzigenVar WHERE id = $id");
    }
    if (isset($_POST["duurWijzigen"])) {
        $duurWijzigenVar = $_POST["duurWijzigen"];
        $duurWijzigen = $conn->query("UPDATE films SET duur = $duurWijzigenVar WHERE id = $id");
    }
}

?>