<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyBank - Contact Us</title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; background:#f4f7f8; }
    .navbar { background:#007bff; padding:15px 20px; display:flex; justify-content:space-between; align-items:center; }
    .navbar h1 { color:white; font-size:22px; margin:0; }
    .navbar ul { list-style:none; display:flex; margin:0; padding:0; }
    .navbar ul li { margin-left:20px; }
    .navbar ul li a { text-decoration:none; color:white; font-size:16px; padding:6px 12px; border-radius:4px; transition:0.3s; }
    .navbar ul li a:hover { background:white; color:#007bff; }
    .container { max-width:500px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.2); }
    h2 { text-align:center; color:#333; margin-bottom:20px; }
    input, textarea { width:100%; padding:12px; margin:10px 0; border:1px solid #ccc; border-radius:6px; font-size:15px; }
    .btn { background:#007bff; color:#fff; padding:12px; width:100%; border:none; border-radius:6px; font-size:16px; cursor:pointer; }
    .btn:hover { background:#0056b3; }
    .message { text-align:center; margin-top:15px; font-size:14px; }
    .success { color:green; }
    .error { color:red; }
  </style>
</head>
<body>
  <!-- Navbar -->
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

  <!-- Contact Form -->
  <div class="container">
    <h2>📩 Contact Us</h2>
    <form action="contact_action.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn">Send Message</button>
    </form>

    <!-- Success/Error message (optional) -->
    <?php
      if (isset($_GET['status'])) {
          if ($_GET['status'] == 'success') {
              echo "<p class='message success'>✅ Message sent successfully!</p>";
          } elseif ($_GET['status'] == 'error') {
              echo "<p class='message error'>❌ Failed to send message. Try again.</p>";
          }
      }
    ?>
  </div>
</body>
</html>
