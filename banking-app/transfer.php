<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipient_email = $_POST['email'];
    $amount = $_POST['amount'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$recipient_email]);
    $recipient = $stmt->fetch();

    $stmt = $pdo->prepare("SELECT balance FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $sender = $stmt->fetch();

    if ($recipient && $amount > 0 && $sender['balance'] >= $amount) {
        // Deduct from sender
        $stmt = $pdo->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
        $stmt->execute([$amount, $_SESSION['user_id']]);

        // Add to recipient
        $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        $stmt->execute([$amount, $recipient['id']]);

        // Record transaction for sender
        $stmt = $pdo->prepare("INSERT INTO transactions (user_id, type, amount, recipient_id) VALUES (?,?,?,?)");
        $stmt->execute([$_SESSION['user_id'], 'transfer', $amount, $recipient['id']]);

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid recipient or insufficient balance!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Transfer - Banking App</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="form-box">
  <h2>Transfer Money</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Recipient Email" required><br>
    <input type="number" step="0.01" name="amount" placeholder="Enter amount" required><br>
    <button type="submit">Transfer</button>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
  </form>
</div>
</body>
</html>
