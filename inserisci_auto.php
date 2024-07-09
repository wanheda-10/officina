<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $marca = $_POST['marca'];
    $modello = $_POST['modello'];
    $targa = $_POST['targa'];
    $anno = $_POST['anno'];
    $colore = $_POST['colore'];

    $stmt = $conn->prepare("INSERT INTO auto (cliente_id, marca, modello, targa, anno, colore) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssis", $cliente_id, $marca, $modello, $targa, $anno, $colore);

    if ($stmt->execute()) {
        echo "Auto inserita con successo.";
    } else {
        echo "Errore nell'inserimento dell'auto.";
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
    <title>Inserisci Auto</title>
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inserisci Auto</h1>
        <form action="inserisci_auto.php" method="post">
            <label for="cliente_id">Cliente ID:</label>
            <input type="number" id="cliente_id" name="cliente_id" required>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>
            <label for="modello">Modello:</label>
            <input type="text" id="modello" name="modello" required>
            <label for="targa">Targa:</label>
            <input type="text" id="targa" name="targa" required>
            <label for="anno">Anno:</label>
            <input type="number" id="anno" name="anno">
            <label for="colore">Colore:</label>
            <input type="text" id="colore" name="colore">
            <button type="submit">Inserisci Auto</button>
        </form>
    </div>
</body>
</html>
