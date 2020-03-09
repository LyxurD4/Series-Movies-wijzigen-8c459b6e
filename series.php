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

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $informatie = $conn->query("select * from series where id = $id");
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
        <h1><?php echo $row["title"]; echo " - "; echo $row["rating"] ?></h1>
        <form action="editserie.php" method="POST">
            <p>Title - <input type="text" name="titleWijzigen" value="<?php echo $row["title"] ?>"></p>
            <p>Awards - <input type="text" name="awardWijzigen" value="<?php echo $row["has_won_awards"] ?>"></p>
            <p>Rating - <input type="text" name="ratingWijzigen" value="<?php echo $row["rating"] ?>"></p>
            <p>Country - <input type="text" name="countryWijzigen" value="<?php echo $row["country"] ?>"><p>
            <p>Language - <input type="text" name="languageWijzigen" value="<?php echo $row["language"] ?>"></p>
            <p>Seasons - <input type="text" name="seasonWijzigen" value="<?php echo $row["seasons"] ?>"></p>
            <p><textarea name="descriptionWijzigen" cols="60" rows="15"><?php echo $row["description"] ?></textarea></p>
            <input type="submit" value="Wijzig veranderingen" name="wijziging">
            <input type="hidden" value="<?php echo $_GET["id"] ?>" name="id">
        </form>
    <?php } ?>
</body>
</html>