<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $officina_name = $_POST['officina_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Controlla se l'email è già registrata
    $checkEmailStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if ($checkEmailStmt->num_rows > 0) {
        echo "Email già registrata. <a href='login.html'>Accedi</a>.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (officina_name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $officina_name, $email, $password);

        if ($stmt->execute()) {
            header("Location: login.html");
            exit();
        } else {
            echo "Errore nella registrazione: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}
?>
