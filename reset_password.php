<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reset_code = $_POST['reset_code'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Aggiorna la password nel database se il codice di reset è valido
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_code = NULL WHERE reset_code = ?");
    $stmt->bind_param("ss", $new_password, $reset_code);
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        echo "La tua password è stata reimpostata con successo.";
    } else {
        echo "Codice di recupero non valido.";
    }

    $stmt->close();
    $conn->close();
}
?>

