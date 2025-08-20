<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyBank - Login</title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; background:#f4f7f8; }
    .navbar { background:#007bff; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; }
    .navbar h1 { color:white; font-size:22px; margin:0; }
    .navbar ul { list-style:none; display:flex; margin:0; padding:0; }
    .navbar ul li { margin-left:20px; }
    .navbar ul li a { text-decoration:none; color:white; font-size:16px; padding:6px 12px; border-radius:4px; transition:0.3s; }
    .navbar ul li a:hover { background:white; color:#007bff; }
    .container { max-width:400px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.2); }
    h2 { text-align:center; color:#333; }
    input { width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:6px; }
    .btn { background:#007bff; color:#fff; padding:12px; width:100%; border:none; border-radius:6px; font-size:16px; cursor:pointer; }
    .btn:hover { background:#0056b3; }
  </style>
</head>
<body>
  <div class="navbar">
    <h1>🏦 MyBank</h1>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>

  <div class="container">
    <h2>Login to MyBank</h2>
    <form action="login_action.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="btn">Login</button>
    </form>
  </div>
</body>
</html>
