<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['cliente_nome'];
    $cognome = $_POST['cliente_cognome'];
    $email = $_POST['cliente_email'];
    $telefono = $_POST['cliente_telefono'];

    if ($stmt = $conn->prepare("INSERT INTO clienti (nome, cognome, email, telefono) VALUES (?, ?, ?, ?)")) {
        $stmt->bind_param("ssss", $nome, $cognome, $email, $telefono);

        if ($stmt->execute()) {
            echo "Cliente registrato con successo.";
        } else {
            echo "Errore nella registrazione del cliente.";
        }

        $stmt->close();
    } else {
        echo "Errore nella preparazione della query.";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inserisci Cliente</h1>
        <form action="inserisci_clienti.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <button type="submit">Inserisci Cliente</button>
        </form>
    </div>
</body>
</html>

