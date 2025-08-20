<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banking Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f7f8;
      margin: 0;
      padding: 0;
    }

    /* Navbar Styling */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #007bff;
      padding: 12px 30px;
      color: white;
    }
    .navbar h2 {
      margin: 0;
      font-size: 20px;
    }
    .navbar ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }
    .navbar ul li {
      display: inline;
    }
    .navbar ul li a {
      text-decoration: none;
      color: white;
      font-weight: bold;
      transition: 0.3s;
    }
    .navbar ul li a:hover {
      color: #ffdd57;
    }

    /* Container Form */
    .container {
      max-width: 700px;
      margin: 30px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      font-weight: bold;
      margin-top: 10px;
      display: block;
    }
    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }
    textarea {
      resize: none;
    }
    .gender {
      display: flex;
      gap: 20px;
      margin-top: 5px;
    }
    .btn {
      background: #007bff;
      color: #fff;
      padding: 12px;
      width: 100%;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
    }
    .btn:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <h2>🏦 MyBank</h2>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Register</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
</div>

<!-- Registration Form -->
<div class="container">
  <h2>Bank Account Registration</h2>
  <form action="register_action.php" method="POST">

    <label>Full Name</label>
    <input type="text" name="full_name" required>

    <label>Date of Birth</label>
    <input type="date" name="dob" required>

    <label>Gender</label>
    <div class="gender">
      <label><input type="radio" name="gender" value="Male" required> Male</label>
      <label><input type="radio" name="gender" value="Female" required> Female</label>
      <label><input type="radio" name="gender" value="Other" required> Other</label>
    </div>

    <label>Mobile Number</label>
    <input type="text" name="mobile" pattern="[0-9]{10}" placeholder="10-digit mobile no." required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Aadhaar / PAN</label>
    <input type="text" name="aadhar_pan" required>

    <label>Address</label>
    <textarea name="address" rows="3" required></textarea>

    <label>City</label>
    <input type="text" name="city" required>

    <label>State</label>
    <input type="text" name="state" required>

    <label>Pincode</label>
    <input type="text" name="pincode" pattern="[0-9]{6}" required>

    <label>Country</label>
    <input type="text" name="country" value="India" required>

    <label>Occupation</label>
    <input type="text" name="occupation">

    <label>Account Type</label>
    <select name="account_type" required>
      <option value="Savings">Savings</option>
      <option value="Current">Current</option>
    </select>

    <button type="submit" class="btn">Register Account</button>
  </form>
</div>

</body>
</html>
