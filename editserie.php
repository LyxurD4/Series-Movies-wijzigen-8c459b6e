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

    //Data uit de POST halen
    $titleWijzigenVar = $_POST["titleWijzigen"];
    $awardWijzigenVar = $_POST["awardWijzigen"];
    $ratingWijzigenVar = $_POST["ratingWijzigen"];
    $countryWijzigenVar = $_POST["countryWijzigen"];
    $languageWijzigenVar = $_POST["languageWijzigen"];
    $seasonWijzigenVar = $_POST["seasonWijzigen"];
    $descriptionWijzigenVar = $_POST["descriptionWijzigen"];
    
    //UPDATE
    $conn->query(
        "UPDATE series 
        SET 
        title = '$titleWijzigenVar',
        has_won_awards = $awardWijzigenVar,
        rating = $ratingWijzigenVar,
        country = '$countryWijzigenVar',
        language = '$languageWijzigenVar',
        seasons = $seasonWijzigenVar,
        description = '$descriptionWijzigenVar'
        WHERE id = $id"
    );
}

header("Refresh: 0; url=series.php?id=$id");
exit("You are being redirected to series.php!");

?>