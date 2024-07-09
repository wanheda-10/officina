<?php
// Avvia la sessione
session_start();

// Includi il file di configurazione del database
include 'config.php';

// Includi PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Genera un codice di reset
    $reset_code = bin2hex(random_bytes(16));

    // Controlla se l'email esiste nel database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Aggiorna il codice di reset nel database
        $stmt->bind_result($user_id);
        $stmt->fetch();

        $update_stmt = $conn->prepare("UPDATE users SET reset_code = ? WHERE id = ?");
        $update_stmt->bind_param("si", $reset_code, $user_id);
        $update_stmt->execute();

        // Invia l'email con il codice di reset
        $mail = new PHPMailer(true);

        try {
            // Configurazione del server SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Sostituisci con il tuo host SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com'; // Sostituisci con il tuo indirizzo email
            $mail->Password = 'your_password'; // Sostituisci con la tua password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Mittente
            $mail->setFrom('your_email@gmail.com', 'Autofficina'); // Sostituisci con il tuo indirizzo email e nome

            // Destinatario
            $mail->addAddress($email);

            // Contenuto dell'email
            $mail->isHTML(true);
            $mail->Subject = 'Reset della Password';
            $mail->Body    = "Clicca sul seguente link per reimpostare la tua password: <a href='http://localhost/autofficina/reset_password.php?code=$reset_code'>Reset Password</a>";

            $mail->send();
            echo 'Codice di reset inviato. Controlla la tua email.';
        } catch (Exception $e) {
            echo "Errore nell'invio dell'email: {$mail->ErrorInfo}";
        }
    } else {
        echo "L'email inserita non è registrata.";
    }

    $stmt->close();
    $conn->close();
}
?>
