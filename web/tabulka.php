<?php
// Připojení k databázi
$dbhost = 'localhost'; // Název serveru MySQL (např. localhost)
$dbuser = 'uzivatel';  // Uživatelské jméno pro přihlášení k MySQL
$dbpass = 'heslo';     // Heslo pro přihlášení k MySQL
$dbname = 'databaze';  // Název databáze

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Chyba připojení k databázi: " . $conn->connect_error);
}

// Zpracování dat z formuláře
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $predmet = $_POST['predmet'];
    $body = $_POST['body'];
    $zapocet = $_POST['zapocet'];
    $zkouska = $_POST['zkouska'];
    
    // Uložení dat do databáze
    $sql = "INSERT INTO vysledky (predmet, body, zapocet, zkouska) VALUES ('$predmet', '$body', '$zapocet', '$zkouska')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data byla úspěšně uložena.";
    } else {
        echo "Chyba při ukládání dat: " . $conn->error;
    }
}

$conn->close();
?>