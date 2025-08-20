<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate input amount safely
    $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);

    // Fetch user balance
    $stmt = $pdo->prepare("SELECT balance FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if ($amount !== false && $amount > 0 && $user['balance'] >= $amount) {
        // Deduct balance
        $stmt = $pdo->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
        $stmt->execute([$amount, $_SESSION['user_id']]);

        // Record transaction
        $stmt = $pdo->prepare("INSERT INTO transactions (user_id, type, amount) VALUES (?,?,?)");
        $stmt->execute([$_SESSION['user_id'], 'withdraw', $amount]);

        // Redirect with success message
        header("Location: dashboard.php?msg=withdraw_success");
        exit;
    } else {
        $error = "⚠️ Insufficient balance or invalid amount!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Withdraw - Banking App</title>
  <link rel="stylesheet" href="assets/style.css">
  <style>
      .error { color: red; font-weight: bold; margin-top: 10px; }
  </style>
</head>
<body>
<div class="form-box">
  <h2>Withdraw Money</h2>
  <form method="POST">
    <input type="number" step="0.01" name="amount" placeholder="Enter amount" required><br>
    <button type="submit">Withdraw</button>
    <p><a href="dashboard.php">Back to Dashboard</a></p>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
  </form>
</div>
</body>
</html>
