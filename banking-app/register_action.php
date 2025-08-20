<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";   // change if needed
$password = "";       // change if you set MySQL password
$dbname = "banking";  // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data safely
$full_name   = $conn->real_escape_string($_POST['full_name']);
$dob         = $conn->real_escape_string($_POST['dob']);
$gender      = $conn->real_escape_string($_POST['gender']);
$mobile      = $conn->real_escape_string($_POST['mobile']);
$email       = $conn->real_escape_string($_POST['email']);
$aadhar_pan  = $conn->real_escape_string($_POST['aadhar_pan']);
$address     = $conn->real_escape_string($_POST['address']);
$city        = $conn->real_escape_string($_POST['city']);
$state       = $conn->real_escape_string($_POST['state']);
$pincode     = $conn->real_escape_string($_POST['pincode']);
$country     = $conn->real_escape_string($_POST['country']);
$occupation  = $conn->real_escape_string($_POST['occupation']);
$account_type= $conn->real_escape_string($_POST['account_type']);

// ✅ Check if email OR mobile already exists
$check_sql = "SELECT * FROM users WHERE email='$email' OR mobile='$mobile' LIMIT 1";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script>
        alert('❌ Email or Mobile already exists! Please use another.');
        window.location.href = 'register.php';
    </script>";
    exit();
}

// ✅ Generate unique 12-digit account number
$account_number = mt_rand(100000000000, 999999999999);

// ✅ Fixed IFSC code
$ifsc_code = "BANK12345";

// Insert query
$sql = "INSERT INTO users 
(full_name, dob, gender, mobile, email, aadhar_pan, address, city, state, pincode, country, occupation, account_type, account_number, ifsc_code)
VALUES 
('$full_name', '$dob', '$gender', '$mobile', '$email', '$aadhar_pan', '$address', '$city', '$state', '$pincode', '$country', '$occupation', '$account_type', '$account_number', '$ifsc_code')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('✅ Account created successfully! Please login.');
        window.location.href = 'login.php';
    </script>";
    exit();
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
