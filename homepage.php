<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <h1>Benvenuto nella tua Officina</h1>
        <p>Offriamo servizi professionali per la manutenzione e la riparazione delle vostre auto. La nostra missione è garantire che la vostra auto sia sempre in perfette condizioni.</p>
        <nav>
            <ul>
                <li><a href="inserimento_dati.php">Inserisci Dati</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
tml>
