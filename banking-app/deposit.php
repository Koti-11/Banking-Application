<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    if ($amount > 0) {
        // Update balance
        $stmt = $pdo->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        $stmt->execute([$amount, $_SESSION['user_id']]);

        // Record transaction
        $stmt = $pdo->prepare("INSERT INTO transactions (user_id, type, amount) VALUES (?,?,?)");
        $stmt->execute([$_SESSION['user_id'], 'deposit', $amount]);

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Enter a valid amount.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Deposit - Banking App</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="form-box">
  <h2>Deposit Money</h2>
  <form method="POST">
    <input type="number" step="0.01" name="amount" placeholder="Enter amount" required><br>
    <button type="submit">Deposit</button>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
  </form>
</div>
</body>
</html>
