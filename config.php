<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autofficina";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>


