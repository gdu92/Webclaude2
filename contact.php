<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if ($name === '' || $email === '' || $message === '') {
    header('Location: index.php?status=error');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: index.php?status=error');
    exit;
}

// Configuration — remplacez par votre adresse e-mail
$to = 'votre@email.com';

$subject = 'Nouveau message de ' . $name;

$body  = "Nom : $name\n";
$body .= "E-mail : $email\n\n";
$body .= "Message :\n$message\n";

$headers  = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    header('Location: index.php?status=success');
} else {
    header('Location: index.php?status=error');
}
exit;
