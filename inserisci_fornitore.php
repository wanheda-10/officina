<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $indirizzo = $_POST['indirizzo'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO fornitori (nome, indirizzo, telefono, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $indirizzo, $telefono, $email);

    if ($stmt->execute()) {
        echo "Fornitore inserito con successo.";
    } else {
        echo "Errore nell'inserimento del fornitore.";
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
    <title>Inserisci Fornitore</title>
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Inserisci Fornitore</h1>
        <form action="inserisci_fornitore.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="indirizzo">Indirizzo:</label>
            <input type="text" id="indirizzo" name="indirizzo">
            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <button type="submit">Inserisci Fornitore</button>
        </form>
    </div>
</body>
</html>
