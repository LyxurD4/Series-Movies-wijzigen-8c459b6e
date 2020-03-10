<?php

//Connectie
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

//Goede row gebruiken
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $informatie = $conn->query("select * from films where id = $id");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <br>
    <a href="index.php">Terug</a>
    <?php
    foreach($informatie as $row) { ?>
        <h1><?php echo $row["titel"]; echo " - "; echo $row["duur"] ?> minuten</h1>
        <form action="editmovie.php" method="POST">
            <p>Titel - <input type="text" value="<?php echo $row["titel"] ?>" name="titelWijzigen"></p>
            <p>Duur - <input type="text" value="<?php echo $row["duur"] ?>" name="duurWijzigen"></p>
            <p>Datum van uitkomst - <input type="text" value="<?php echo $row["datum_van_uitkomst"] ?>" name="datumVanUitkomstWijzigen"></p>
            <p>Trailer - <input type="text" value="<?php echo $row["trailer"] ?>" name="trailerWijzigen"></p>
            <input type="hidden" value="<?php echo $_GET["id"] ?>" name="id">
            <br>
            <iframe width="560" height="315" src="<?php echo $row["trailer"] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            
            </iframe>
            <br>
            <input type="submit" value="Wijzig Veranderingen!" name="wijziging">
        </form>
    <?php } ?>
</body>
</html>