<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT t.*, u.name as recipient_name 
                       FROM transactions t 
                       LEFT JOIN users u ON t.recipient_id = u.id
                       WHERE t.user_id = ? ORDER BY t.created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$transactions = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Transactions - Banking App</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="dashboard">
  <h2>Transaction History</h2>
  <table border="1" cellpadding="10" style="margin:auto; background:white; color:black;">
    <tr>
      <th>ID</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Recipient</th>
      <th>Date</th>
    </tr>
    <?php foreach($transactions as $t): ?>
    <tr>
      <td><?php echo $t['id']; ?></td>
      <td><?php echo ucfirst($t['type']); ?></td>
      <td>₹<?php echo number_format($t['amount'], 2); ?></td>
      <td><?php echo $t['recipient_name'] ?? '-'; ?></td>
      <td><?php echo $t['created_at']; ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="dashboard.php">Back to Dashboard</a></p>
</div>
</body>
</html>
