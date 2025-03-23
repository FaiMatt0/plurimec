<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal modulo
    $email = htmlspecialchars($_POST['email']); // Sanitizza l'input
    $messaggio = htmlspecialchars($_POST['messaggio']); // Sanitizza l'input

    // Destinatario dell'email
    $to = "info@plurimec.it";

    // Oggetto dell'email
    $subject = "Richiesta Preventivo da " . $email;

    // Corpo dell'email
    $body = "Email: $email\n\nMessaggio:\n$messaggio";

    // Intestazioni dell'email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Invio dell'email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Grazie! La tua richiesta è stata inviata con successo.</p>";
    } else {
        echo "<p>Si è verificato un errore durante l'invio della richiesta. Riprova più tardi.</p>";
    }
} else {
    echo "<p>Accesso non autorizzato.</p>";
}
?>