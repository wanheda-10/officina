<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auto_id = $_POST['auto_id'];
    $pezzo_id = $_POST['pezzo_id'];
    $descrizione = $_POST['descrizione'];
    $data_intervento = $_POST['data_intervento'];
    $costo = $_POST['costo'];

    $stmt = $conn->prepare("INSERT INTO interventi (auto_id, pezzo_id, descrizione, data_intervento, costo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iissd", $auto_id, $pezzo_id, $descrizione, $data_intervento, $costo);

    if ($stmt->execute()) {
        echo "Intervento inserito con successo.";
    } else {
        echo "Errore nell'inserimento dell'intervento.";
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Intervento</title>
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inserisci Intervento</h1>
        <form action="inserisci_intervento.php" method="post">
            <label for="auto_id">Auto ID:</label>
            <input type="number" id="auto_id" name="auto_id" required>
            <label for="pezzo_id">Pezzo ID:</label>
            <input type="number" id="pezzo_id" name="pezzo_id">
            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione"></textarea>
            <label for="data_intervento">Data Intervento:</label>
            <input type="date" id="data_intervento" name="data_intervento" required>
            <label for="costo">Costo:</label>
            <input type="number" step="0.01" id="costo" name="costo" required>
            <button type="submit">Inserisci Intervento</button>
        </form>
    </div>
</body>
</html>

