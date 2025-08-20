<?php
include 'db.php'; // include your PDO connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);

        header("Location: contact.php?success=1");
        exit;
    } catch (Exception $e) {
        header("Location: contact.php?error=1");
        exit;
    }
}
?>
