<?php
session_start();
if (!isset($_SESSION['account_number'])) {
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Created</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eaf6f9;
      padding: 20px;
    }
    .success-box {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    }
    h2 {
      color: green;
    }
    .details {
      text-align: left;
      margin-top: 20px;
    }
    .details p {
      margin: 8px 0;
      font-size: 16px;
    }
  </style>
</head>
<body>

<div class="success-box">
  <h2>🎉 Account Created Successfully!</h2>
  <div class="details">
    <p><strong>Account Holder:</strong> <?= $_SESSION['full_name']; ?></p>
    <p><strong>Account Number:</strong> <?= $_SESSION['account_number']; ?></p>
    <p><strong>IFSC Code:</strong> <?= $_SESSION['ifsc_code']; ?></p>
    <p><strong>Address:</strong> <?= $_SESSION['address']; ?></p>
    <p><strong>Registration Date:</strong> <?= $_SESSION['reg_date']; ?></p>
  </div>
</div>

</body>
</html>
