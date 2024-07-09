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
    <title>About Us - Auto Officina</title>
    <link rel="stylesheet" href="style1.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Benvenuti alla nostra Auto Officina</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="inserimento_dati.php">Inserisci Dati</a></li>
                <li><a href="view_tabelle.php">Visualizza Dati</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <section class="about-us">
                <h2>Chi Siamo</h2>
                <p>La nostra auto officina è dedicata a fornire servizi di alta qualità per tutte le vostre esigenze automobilistiche. Con anni di esperienza nel settore, il nostro team di meccanici esperti è qui per assicurarsi che il vostro veicolo sia sempre in condizioni ottimali.</p>
            </section>
            <section class="services">
                <h2>Servizi Offerti</h2>
                <ul>
                    <li>Manutenzione ordinaria e straordinaria</li>
                    <li>Diagnostica elettronica</li>
                    <li>Sostituzione e riparazione pneumatici</li>
                    <li>Revisione veicoli</li>
                    <li>Servizi di carrozzeria</li>
                    <li>Controllo dei freni</li>
                </ul>
            </section>
            <section class="contact">
                <h2>Contattaci</h2>
                <p>Per qualsiasi domanda o per fissare un appuntamento, non esitate a contattarci.</p>
                <p>Email: info@autofficina.com</p>
                <p>Telefono: 123-456-7890</p>
                <p>Indirizzo: Via Roma, 123, 00100 Roma, Italia</p>
            </section>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Auto Officina. Tutti i diritti riservati.</p>
        </footer>
    </div>
</body>
</html>
