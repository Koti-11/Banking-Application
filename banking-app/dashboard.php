<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Banking App</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="dashboard">
  <h2>Welcome, <?php echo $user['name']; ?> 👋</h2>
  <h3>Balance: ₹<?php echo number_format($user['balance'], 2); ?></h3>
  <div class="actions">
    <a href="deposit.php">Deposit</a>
    <a href="withdraw.php">Withdraw</a>
    <a href="transfer.php">Transfer</a>
    <a href="transactions.php">Transactions</a>
    <a href="logout.php">Logout</a>
  </div>
</div>
</body>
</html>
