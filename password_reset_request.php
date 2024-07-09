<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $reset_code = bin2hex(random_bytes(16));
        $stmt->bind_result($id);
        $stmt->fetch();

        $stmt->close();

        $stmt = $conn->prepare("UPDATE users SET reset_code = ? WHERE id = ?");
        $stmt->bind_param("si", $reset_code, $id);
        $stmt->execute();

        $reset_link = "http://yourdomain.com/reset_password.php?code=$reset_code";
        $subject = "Reset Your Password";
        $message = "Clicca sul seguente link per reimpostare la tua password: $reset_link";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);

        echo "Un'email con il codice di reset è stata inviata.";
    } else {
        echo "Email non trovata.";
    }

    $stmt->close();
    $conn->close();
}
?>
