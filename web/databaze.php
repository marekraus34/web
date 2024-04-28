<?php
// Připojení k databázi
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola spojení
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Získání dat z formuláře
$predmet = $_POST['predmet'];
$body = $_POST['body'];
$zapocet = $_POST['zapocet'];

// Vložení dat do databáze
$sql = "INSERT INTO predmety (predmet, body, zapocet) VALUES ('$predmet', '$body', '$zapocet')";

if ($conn->query($sql) === TRUE) {
    echo "Data byla úspěšně vložena.";
} else {
    echo "Chyba: " . $sql . "<br>" . $conn->error;
}

// Uzavření spojení s databází
$conn->close();
?>
