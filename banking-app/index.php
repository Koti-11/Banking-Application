<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login - Banking App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    /* Navbar */
    .navbar {
      background: #007bff;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar h1 {
      color: white;
      font-size: 22px;
      margin: 0;
    }
    .navbar ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }
    .navbar ul li {
      margin-left: 20px;
    }
    .navbar ul li a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      padding: 6px 12px;
      border-radius: 4px;
      transition: 0.3s;
    }
    .navbar ul li a:hover {
      background: white;
      color: #007bff;
    }

    /* Login box */
    .login-box {
      background: white;
      padding: 30px;
      max-width: 400px;
      margin: 60px auto;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .login-box h2 {
      margin-bottom: 20px;
      color: #333;
    }
    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-box button {
      background: #007bff;
      color: white;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    .login-box button:hover {
      background: #0056b3;
    }
    .login-box p {
      margin-top: 15px;
    }
    .login-box .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <div class="logo">
    <h1>🏦 MyBank</h1>
  </div>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="about.php">About</a></li>
  </ul>
</div>

<!-- Login Box -->
<div class="login-box">
  <h2>Banking Portal</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
    <p>New user? <a href="register.php">Register here</a></p>
    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
  </form>
</div>

</body>
</html>
