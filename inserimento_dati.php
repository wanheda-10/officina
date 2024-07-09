
<?php
include 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_clienti'])) {
        // Handle client insertion
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        $stmt = $conn->prepare("INSERT INTO clienti (nome, cognome, email, telefono) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $cognome, $email, $telefono);
        $stmt->execute();
        echo "Cliente inserito con successo.";
    } elseif (isset($_POST['submit_auto'])) {
        // Handle car insertion
        $cliente_id = $_POST['cliente_id'];
        $marca = $_POST['marca'];
        $modello = $_POST['modello'];
        $targa = $_POST['targa'];
        $anno = $_POST['anno'];

        $stmt = $conn->prepare("INSERT INTO auto (cliente_id, marca, modello, targa, anno) VALUES (?,?, ?, ?, ?, ?)");
        $stmt->bind_param("isssis", $cliente_id, $marca, $modello, $targa, $anno, $colore);
        $stmt->execute();
        echo "Auto inserita con successo.";
    } elseif (isset($_POST['submit_fornitori'])) {
        // Handle supplier insertion
        $nome = $_POST['nome'];
        $indirizzo = $_POST['indirizzo'];
        $telefono = $_POST['telefono'];

        $stmt = $conn->prepare("INSERT INTO fornitori (nome, indirizzo, telefono) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $indirizzo, $telefono);
        $stmt->execute();
        echo "Fornitore inserito con successo.";
    } elseif (isset($_POST['submit_pezzi'])) {
        // Handle spare parts insertion
        $nome = $_POST['nome'];
        $descrizione = $_POST['descrizione'];
        $prezzo = $_POST['prezzo'];
        $fornitore_id = ($_POST['fornitore_id']);

        $stmt = $conn->prepare("INSERT INTO pezzi_di_ricambio (nome, descrizione, prezzo, quantita, fornitore_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdii", $nome, $descrizione, $prezzo, $quantita, $fornitore_id);
        $stmt->execute();
        echo "Pezzo di ricambio inserito con successo.";
    } elseif (isset($_POST['submit_interventi'])) {
        // Handle interventions insertion
        $auto_id = $_POST['auto_id'];
        $descrizione = $_POST['descrizione'];
        $data = $_POST['data_intervento'];
        $costo = ($_POST['costo']);

        $stmt = $conn->prepare("INSERT INTO interventi (auto_id, descrizione, data_intervento, costo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issd", $auto_id, $descrizione, $data, $costo);
        $stmt->execute();
        echo "Intervento inserito con successo.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Dati</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inserimento Dati</h1>

        <nav>
            <ul>
                <li><a href="homepage.php">Homepage</a></li>
                <li><a href="view_tabelle.php">Visualizza Dati</a></li>
            </ul>
        </nav>

        <h2>Inserisci Cliente</h2>
        <form action="inserimento_dati.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <button type="submit" name="submit_clienti">Inserisci Cliente</button>
        </form>

        <h2>Inserisci Auto</h2>
        <form action="inserimento_dati.php" method="post">
            <label for="cliente_id">ID Cliente:</label>
            <input type="text" id="cliente_id" name="cliente_id" required>

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="modello">Modello:</label>
            <input type="text" id="modello" name="modello" required>

            <label for="targa">Targa:</label>
            <input type="text" id="targa" name="targa" required>

            <label for="anno">Anno:</label>
            <input type="text" id="anno" name="anno" required>

            <label for="colore">Colore:</label>
            <input type="text" id="colore" name="colore">

            <button type="submit" name="submit_auto">Inserisci Auto</button>
        </form>

        <h2>Inserisci Fornitore</h2>
        <form action="inserimento_dati.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="indirizzo">Indirizzo:</label>
            <input type="text" id="indirizzo" name="indirizzo" required>

            <label for="telefono">Telefono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <button type="submit" name="submit_fornitori">Inserisci Fornitore</button>
        </form>

        <h2>Inserisci Pezzo di Ricambio</h2>
        <form action="inserimento_dati.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descrizione">Descrizione:</label>
            <input type="text" id="descrizione" name="descrizione" required>

            <label for="prezzo">Prezzo:</label>
            <input type="text" id="prezzo" name="prezzo" required>

            <label for="quantita">Quantità:</label>
            <input type="number" id="quantita" name="quantita" required>

            <label for="fornitore_id">ID Fornitore:</label>
            <input type="number" id="fornitore_id" name="fornitore_id" required>

            <button type="submit" name="submit_pezzi">Inserisci Pezzo di Ricambio</button>
        </form>

        <h2>Inserisci Intervento</h2>
        <form action="inserimento_dati.php" method="post">
            <label for="auto_id">ID Auto:</label>
            <input type="text" id="auto_id" name="auto_id" required>

            <label for="descrizione">Descrizione:</label>
            <input type="text" id="descrizione" name="descrizione" required>

            <label for="data_intervento">Data Intervento:</label>
            <input type="date" id="data_intervento" name="data_intervento" required>

            <label for="costo">Costo:</label>
            <input type="text" id="costo" name="costo" required>

            <button type="submit" name="submit_interventi">Inserisci Intervento</button>
        </form>
    </div>
</body>
</html>




