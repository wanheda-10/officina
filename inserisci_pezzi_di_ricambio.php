<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descrizione = $_POST['descrizione'];
    $prezzo = $_POST['prezzo'];
    $quantita = $_POST['quantita'];
    $fornitore_id = $_POST['fornitore_id'];

    $stmt = $conn->prepare("INSERT INTO pezzi_di_ricambio (nome, descrizione, prezzo, quantita, fornitore_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdis", $nome, $descrizione, $prezzo, $quantita, $fornitore_id);

    if ($stmt->execute()) {
        echo "Pezzo di ricambio inserito con successo.";
    } else {
        echo "Errore nell'inserimento del pezzo di ricambio.";
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
    <title>Inserisci Pezzo di Ricambio</title>
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inserisci Pezzo di Ricambio</h1>
        <form action="inserisci_pezzi_di_ricambio.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione"></textarea>
            <label for="prezzo">Prezzo:</label>
            <input type="number" step="0.01" id="prezzo" name="prezzo" required>
            <label for="quantita">Quantità:</label>
            <input type="number" id="quantita" name="quantita" required>
            <label for="fornitore_id">Fornitore ID:</label>
            <input type="number" id="fornitore_id" name="fornitore_id">
            <button type="submit">Inserisci Pezzo di Ricambio</button>
        </form>
    </div>
</body>
</html>
