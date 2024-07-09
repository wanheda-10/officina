
<?php
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Connessione al database
$host = 'localhost';
$dbname = 'autofficina';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

function fetch_data($conn, $table) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>" . ucfirst($table) . "</h2>";
        echo "<table>";
        echo "<tr>";

        // Fetch and display column names
        while ($fieldinfo = $result->fetch_field()) {
            echo "<th>" . $fieldinfo->name . "</th>";
        }

        echo "</tr>";

        // Fetch and display rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessun dato trovato per la tabella $table.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Dati</title>
    <link rel="stylesheet" href="view_tabelle.css">
</head>
<body>
    <div class="container">
        <h1>Visualizza Dati</h1>
        <?php
        $tables = ['clienti', 'auto', 'fornitori', 'pezzi_di_ricambio', 'interventi'];
        foreach ($tables as $table) {
            fetch_data($conn, $table);
        }
        $conn->close();
        ?>
        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
